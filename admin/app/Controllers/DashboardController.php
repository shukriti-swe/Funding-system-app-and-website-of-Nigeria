<?php

namespace App\Controllers;

class DashboardController extends BaseController {

    public function index() {
        return view('Dashboard/index');
    }
    public function home() {
        // die();    
        $runningThrifts = $this->get_all_ACTIVE_RUNNING_THRIFTS();
        $thriftVol = $this->get_all_ACTIVE_THRIFTS_VOLUME();
        $avgThriftsVol = $this->get_all_AVERAGE_THRIFTS_VOLUME();
        $activeThrift = $this->get_all_MEMBERS_IN_ACTIVE_THRIFT();

        $chartValues = $this->get_all_CHART_VALUE();
        $getMessages = $this->get_all_INBOX_MESSAGE_ITEMS();
        $recentWithdrawal = $this->get_all_RECENT_WITHDRAWAL_REQUEST();


        $data = [
            'runningThrifts' => $runningThrifts,
            'thriftVol' => $thriftVol,
            'avgThriftsVol' => $avgThriftsVol,
            'activeThrift' => $activeThrift,
            'getMessages' => $getMessages,
            'chartValues' => $chartValues,
            'recentWithdrawal' => $recentWithdrawal,
        ];
        // echo "<pre>"; print_r($recentWithdrawal); die();

        return view('Dashboard/index', $data);
    }



    protected function get_all_ACTIVE_RUNNING_THRIFTS(){
        $today_date = date('Y-m-d');
        $builder =$this->db->table('thrift_two_win');
        $builder->select('*');
        $query = $builder->where('thrift_group_start_date <=',$today_date);
        $query = $builder->where('thrift_group_end_date >=',$today_date);
        $query = $builder->get();
        $results = $query->getResultArray();

        // echo $this->db->getLastQuery();
        $runningThrifts = count($results);
        return $runningThrifts;
    }
    protected function get_all_ACTIVE_THRIFTS_VOLUME(){
        $today_date = date('Y-m-d');
        $builder =$this->db->table('thrift_two_win');
        $builder->select('(SELECT SUM(thrift_group_member_count*thrift_group_product_price)) as thrift_volume');
        $builder->where('thrift_group_start_date <=',$today_date);
        $builder->where('thrift_group_end_date >=',$today_date);
        $query = $builder->get();
        $thriftsVolume = $query->getRowArray();
        return $thriftsVolume;
    }
    protected function get_all_AVERAGE_THRIFTS_VOLUME(){
        $today_date = date('Y-m-d');
        $builder =$this->db->table('thrift_two_win');
        $builder->select('(SELECT AVG(thrift_group_member_count*thrift_group_product_price)) as avg_thrift_volume');
        $builder->where('thrift_group_start_date <=',$today_date);
        $builder->where('thrift_group_end_date >=',$today_date);
        $query = $builder->get();
        $AvgThriftsVol = $query->getRowArray();
        return $AvgThriftsVol;

        // echo $this->db->getLastQuery();
        // echo "<pre>"; print_r($thriftsVolume); die();
    }
    protected function get_all_MEMBERS_IN_ACTIVE_THRIFT(){
        $today_date = date('Y-m-d');
        $builder =$this->db->table('thrift_two_win');
        $builder->select('(SELECT SUM(thrift_group_member_count)) as active_thrift');
        $builder->where('thrift_group_start_date <=',$today_date);
        $builder->where('thrift_group_end_date >=',$today_date);
        $query = $builder->get();
        $activeThrift = $query->getRowArray();
        return $activeThrift;

        // echo $this->db->getLastQuery();
        // echo "<pre>"; print_r($thriftsVolume); die();
    }
    protected function get_all_INBOX_MESSAGE_ITEMS(){
        $builder =$this->db->table('support_message');
        $builder->select('*');
        $query = $builder->get();
        $getMessages = $query->getResultArray();
        return $getMessages;

        // echo $this->db->getLastQuery();
        // echo "<pre>"; print_r($thriftsVolume); die();
    }
    protected function get_all_CHART_VALUE(){
        $builder =$this->db->table('thrift_two_win_payment_log');
        $builder->select('COUNT(id) as total, deposits_amount,deposits_date');
        // $builder->select('COUNT(id as ids),deposits_amount, deposits_date');
        $query = $builder->groupBy('MONTH(deposits_date)');
        $query = $builder->get();
        $chartValue = $query->getResultArray();

        // echo $this->db->getLastQuery();
        // echo "<pre>"; print_r($chartValue); die();
        return $chartValue;
    }
    protected function get_all_RECENT_WITHDRAWAL_REQUEST(){
        $builder =$this->db->table('thrift_two_win_withdraw');
        $builder->select('users.email,thrift_two_win_withdraw.withdraw_amount,thrift_two_win_withdraw.status');
        $builder->join('users', 'thrift_two_win_withdraw.user_id = users.id');
        $query = $builder->get();
        $recentWithdrawal = $query->getResultArray();

        // echo $this->db->getLastQuery();
        // echo "<pre>"; print_r($chartValue); die();
        return $recentWithdrawal;
    }
























}
