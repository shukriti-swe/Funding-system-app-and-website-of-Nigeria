<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmailTemplate;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\Settings;
use App\Models\Thrifttowinwithdraw;

class CronController extends BaseController
{
    /* Send Thrift invitations email
    *  invitations email are queed, and this cron job process that queue 
    *  Each time it runs takes 10 items from queue 
    */

    public function emailInvites()
    {
        $nbuilder = $this->db->table('thrift_two_win_invited_member');
        $nbuilder->select('*');
        $nbuilder->where('status', 0);
        $nbuilder->limit(10);

        $query = $nbuilder->get();
        $result = $query->getResultArray();

        foreach ($result as $in) {
            $ubuilder = $this->db->table('users');
            $ubuilder->where('id', $in['invited_by_user']);
            $query = $ubuilder->get();
            $user = $query->getrow();

            $tbuilder = $this->db->table('thrift_two_win');
            $tbuilder->where('id', $in['thrift_id']);
            $query = $tbuilder->get();
            $thrift_group = $query->getrow();
            $thrift_group_member_count = 0;
            if ($thrift_group) {

                if (is_numeric($thrift_group->thrift_group_member_count)) {
                    $thrift_group_member_count = $thrift_group->thrift_group_member_count;
                }
            }


            $email_template = new EmailTemplate();
            $template = $email_template->where('email_template_type', 'thrift2win_invitation')->find();

            $template_message = $template[0]['email_template'];
            $find = array("{{username}}", "{{userbyemail}}", "{{group_name}}", "{{group_info}}", "{{total_join_member}}");
            $replace = array($in['invited_email'], $user->email, $thrift_group->thrift_name, $thrift_group->thrift_description, $thrift_group_member_count);
            $message = str_replace($find, $replace, $template_message);
            $subject = $template[0]['email_template_subject'];
            $send_email = rs_send_email($in['invited_email'], $subject, $message);
            $model = $this->db->table('thrift_two_win_invited_member');
            $model->where('id', $in['id'])->set(['status' => 1])->update();
        }
    }


    public function thriftend()
    {
        /*
        * select Thrift
        */ 
        $nbuilder = $this->db->table('thrift_two_win');
        $nbuilder->select('id,thrift_group_product_price,thrift_group_term_duration, thrift_group_member_count');
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

            $winpercent = 10;
            
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
                /**
                 * For now interest rate is fixed. 
                 * But later would be form settings
                 */
                $thrift->interest_rate=5;

                $data['thrift_group_id'] = $thrift->id;
                $amount_total = $thrift->thrift_group_member_count *  $thrift->thrift_group_product_price * ($thrift->interest_rate / 100) * ($thrift->thrift_group_term_duration/12); 
                $amount_total = round($amount_total,2 );                
                $data['deposits_amount'] = $amount_total;
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
    public function getEmptyPayCustomer(){
        $user_model = new UserModel();
        $get_empty_paystack= $user_model->where('pay_customer_id',null)->orwhere('pay_customer_id','')->findall();
  
        if(!empty($get_empty_paystack)){
        $x=0;
        foreach($get_empty_paystack as $user){
            
           $create_customer = $this->createPaystackCustomer($user['email'],$user['first_name'],$user['last_name'],$user['phone']); 
           $get_customer = json_decode($create_customer,true);
           $data['pay_customer_id'] = $get_customer['data']['customer_code'];

           $update = $user_model->update($user['id'],$data);
           if($update){
            $x = $x+1;
           }
        }
        $success = $this->generateSuccess($x.lang('Account.pay_customer_id_updated'),$data);
        return $this->getResponse($success,ResponseInterface::HTTP_OK);
        
        }else{
            $success = $this->generateSuccess(lang('Account.no_pay_customer_id'),[]);
            return $this->getResponse($success,ResponseInterface::HTTP_OK);
        }
        
    }

    private function createPaystackCustomer($email, $firstName, $lastName, $phone){
        $Settings_model = new Settings();
        $payments_setting = $Settings_model->where('settings_key', 'payment_setting')->first();

        $results = json_decode($payments_setting['settings_value']);

        if($results->paystack_test_mode == 'On'){
            $SECRET_KEY = $results->paystack_test_secret_key;
        }else{
            $SECRET_KEY = $results->paystack_live_secret_key;
        }

        $url = "https://api.paystack.co/customer";
        $fields = [
            "email" => $email,
            "first_name" => $firstName,
            "last_name" => $lastName,
            "phone" => $phone
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $SECRET_KEY",
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $result = curl_exec($ch);
        return $result;
    }
    public function withdrawCheckAndTransfer(){

        $withdraw_model = new Thrifttowinwithdraw();

        $builder = $this->db->table('thrift_two_win_withdraw wd');
        $builder->join('users u', 'wd.user_id  = u.id');
        $builder->select('wd.id as id,wd.account_number as account_number,wd.bank_code as bank_code,wd.withdraw_amount as withdraw_amount,u.first_name as first_name,u.last_name as last_name');
        $builder->where('status', 1);
        $builder->limit(10);

        $query = $builder->get();
        $results = $query->getResultArray();

       foreach($results as $withdraw){

        $Settings_model = new Settings();
        $payments_setting = $Settings_model->where('settings_key', 'payment_setting')->first();
        
        $results = json_decode($payments_setting['settings_value']);
        if($results->paystack_test_mode == 'On'){
            $SECRET_KEY = $results->paystack_test_secret_key;
        }else{
            $SECRET_KEY = $results->paystack_live_secret_key;
        }

        $name = $withdraw['first_name'].' '.$withdraw['last_name'];

        $url = "https://api.paystack.co/transferrecipient";
        $fields = [
            "type" => "nuban",
            "name" => $name,
            "account_number" => $withdraw['account_number'],
            "bank_code" => $withdraw['bank_code'],
            "currency" => "NGN"
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $SECRET_KEY",
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $result = curl_exec($ch);

        $get_recepient = json_decode($result,true);
  
        if(empty($get_recepient['status'])){
          
            
           
            $data['error_status']= $get_recepient['message'];
            $update = $withdraw_model->update($withdraw['id'],$data);
           
            $error = $this->generateError($get_recepient['message']);
            return $this->getResponse($error, ResponseInterface::HTTP_OK);
        }
       
      $recipient_code =$get_recepient['data']['recipient_code'];
      
       

        $url = "https://api.paystack.co/transfer";
        $fields = [
            'source' => "balance",
            'amount' => $withdraw['withdraw_amount'],
            'recipient' => $recipient_code,
            'reason' => "Thrift2win"
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $SECRET_KEY",
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $results = curl_exec($ch);
        $get_transfer = json_decode($results,true);
  
        if(empty($get_transfer['status'])){
          
            $withdraw_model = new Thrifttowinwithdraw();
           
            $data['error_status']= $get_transfer['message'];
            $data['status']= 4;
        
            $update = $withdraw_model->update($withdraw['id'],$data);
        
            $error = $this->generateError($get_transfer['message']);
            return $this->getResponse($error, ResponseInterface::HTTP_OK);
        }else{
            
             $success_transfer = json_decode($results,true);
             
             $transfer['status']=2;
             $transfer['status_details']=$results;
             $update = $withdraw_model->update($withdraw['id'],$transfer);
             
             $success = $this->generateSuccess($success_transfer['message'],[]);
             return $this->getResponse($success,ResponseInterface::HTTP_OK);
        }
        
       
       }

    }
}
