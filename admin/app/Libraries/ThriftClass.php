<?php
#namespace App\Libraries;
use App\Models\UserModel;
use App\Models\Thrifttwowinwinner;

class Thrift{
    var $db;

    public function __construct(){
        $this->db = db_connect();         
    }

    public function thriftend()
    {
        /*
        * select Thrift
        */ 
        $nbuilder = $this->db->table('thrift_two_win');
        $nbuilder->select('id,thrift_group_product_price');
        $nbuilder->where('thrift_group_end_date  <=', date('Y-m-d'));
        $nbuilder->where('thrift_group_open', 1);
        $nbuilder->limit(1);
        $query = $nbuilder->get();
        $thrift = $result = $query->getRow();
        
        if ($thrift) {
            /*
            * select Thrift members
            */ 
            $tbuilder = $this->db->table('thrift_two_win_member');
            $tbuilder->select('thrift_group_member_id');
            $tbuilder->where('thrift_group_id', $thrift->id);
            $query = $tbuilder->get();
            $members = $query->getResultArray();

            /*
            * select Thrift winner
            */ 
            $arr =  array_column($members, 'thrift_group_member_id');
            $key = array_rand($arr);
            $winner = $arr[$key];

            /*
            * select Wining percent , This code is commented as we don't have settings yet for this
            */ 
            //$wpercent = $this->db->table('rspm_tbl_settings');
            //$wpercent->select('settings_value');
            //$wpercent->where('settings_key', 'prosperisgold_winner_percent');
            //$query = $wpercent->get();
            //$percentInfo = $result = $query->getRow();
            //$percentInfo = json_decode($percentInfo->settings_value);

            $winpercent = 10;
            //foreach ($percentInfo as $percent) {
                //if (($percent->start <= $thrift->thrift_group_product_price) && ($thrift->thrift_group_product_price <= $percent->end)) {
                   // $winpercent = $percent->percent;
                //}
            //}
            /*
            * Deposits Member amount
            */
            $ttwdbuilder = $this->db->table('thrift_two_win_deposits');
            foreach ($members as $mem) {
                $data = [];
                $data['thrift_group_id'] = $thrift->id;
                $data['deposits_amount'] = $thrift->thrift_group_product_price;
                $data['deposits_date'] = date('Y-m-d');
                $data['user_id'] = $mem['thrift_group_member_id'];
                $data['status'] = 1;
                $ttwdbuilder->insert($data);
            }
            /*
            * Deposits Winner amount
            */
            if ($winner) {
                $data['thrift_group_id'] = $thrift->id;
                $data['deposits_amount'] = ($winpercent / 100) * $thrift->thrift_group_product_price;
                $data['deposits_date'] = date('Y-m-d');
                $data['user_id'] = $winner;
                $data['status'] = 1;
                $ttwdbuilder->insert($data);
            }


            /*
            * Thrift winner save.
            */

            $windbuilder = $this->db->table('thrift_two_win_winner');
            $wdata['thrift_group_id'] = $thrift->id;
            $wdata['user_id'] = $winner;
            $wdata['status'] = 1;
            $windbuilder->insert($wdata);


            /*
            * Thrift Status update and thrift close.
            */
            $ubuilder = $this->db->table('thrift_two_win');
            $ubuilder->where('id', $thrift->id)->set(['thrift_group_open'=>0])->update();

        }


    }

    public function getThriftWinner($thriftid){
        $nbuilder = $this->db->table('thrift_two_win_winner tw');
        $nbuilder->join('users u', 'tw.user_id = u.id');
        $nbuilder->select('tw.thrift_group_id as thrift_id, u.first_name, u.last_name, u.email, u.user_profile_image, u.user_gender');
        $nbuilder->where('tw.thrift_group_id', $thriftid);
        $query = $nbuilder->get();
        return $thrift_group = $query->getrow();
    }
}