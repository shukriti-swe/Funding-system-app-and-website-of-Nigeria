<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\GroupmemberModel;
use App\Models\UserdetailsModel;
use App\Models\UserVerification;
use App\Models\Pgproduct;
use App\Models\Thrifttwowinreferralamount;
use App\Models\Settings;
use App\Models\Thrifttwowin;
use App\Models\Thrifttwowinmember;
use App\Models\EmailTemplate;
use App\Models\Thrifttowinbankaccount;
use App\Models\Thrifttowinbank;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ReflectionException;
use CodeIgniter\Events\Events;
use DateTime;

class AccountController extends BaseController
{

    /**
     * Create a new deposit entry
     * To do :: Log paystack payment info 
     * @return Response
     */

    public function deposits()
    {
        $input = $this->getRequestInput($this->request);
        $rules = [
            'thrift_group_id' => 'required|integer',
            'deposits_amount' => 'required|numeric',
            'paystack_id' => 'required',
            'payment_type' => 'required',   // Bank , Card or Wallet
            'payment_info' => 'required',   // Additional Payment info provided by Paystack after payment, send as json format         
        ];

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }


        // $nbuilder = $this->db->table('thrift_two_win_member');
        // $nbuilder->where('thrift_group_member_id', CURRENT_USER['id']);
        // $nbuilder->where('thrift_group_id', $input['thrift_group_id']);
        // $query = $nbuilder->get();
        // $joined_group = $query->getrow();

        // if (!$joined_group) {
        // /*
        // * 
        // * Current user not joined this thrift.
        // *
        // */
        //     $error = $this->generateError(lang('Account.not_join_in_thrift'));
        //     return $this
        //         ->getResponse(
        //             $error,
        //             ResponseInterface::HTTP_OK
        //         );
        // }



        $nbuilder = $this->db->table('thrift_two_win');
        $nbuilder->where('id', $input['thrift_group_id']);
        $query = $nbuilder->get();
        $thrift_group = $query->getrow();

        if (!$thrift_group) {

        /*
        * 
        * Thrift not found
        *
        */
            $error = $this->generateError('No thrift Found.');
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }

        /*
        * 
        * Thrift date is over
        *
        */

        if (date('Y-m-d') > $thrift_group->thrift_group_end_date) {
            $error = $this->generateError(lang('Thrift.thrift_date_end'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }

        
        $builder = $this->db->table('thrift_two_win_deposits');
        $data = [];
        $data['thrift_group_id'] = $input['thrift_group_id'];
        $data['deposits_amount'] = $input['deposits_amount'];
        $data['deposits_date'] = date('Y-m-d H:i:s');
        $data['user_id'] = CURRENT_USER['id'];
        $data['status'] = 1; 

        if ($builder->insert($data)) {
            //Now save in payment log
            $this->addPaymentInfo($input);
            
            $thriftmember_model = new Thrifttwowinmember();
            $check_thrift_member = $thriftmember_model->where('thrift_group_id', $input['thrift_group_id'])->where('thrift_group_member_id', CURRENT_USER['id'])->first();

            if(empty($check_thrift_member)){
                $this->joinThrift($input['thrift_group_id']);
            }
            
            $sucess = $this->generateSuccess(lang('Account.deposits_sucessfull'), []);
            return $this
                ->getResponse(
                    $sucess
                );
        } else {
            $error = $this->generateError(lang('Account.deposit_not_saved'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
    }
    ///////
    public function joinThrift($thrift_group_id)
    {
        // $input = $this->getRequestInput($this->request);
        // $rules = [
        //     'thrift_id' => 'required|numeric',
        // ];

        // if (!$this->validateRequest($input, $rules)) {
        //     $error = $this->generateError($this->validator->getErrors());
        //     return $this
        //         ->getResponse(
        //             $error,
        //             ResponseInterface::HTTP_OK
        //         );
        // }
        
        
        $thrift_group_member_count = 0;

        $nbuilder = $this->db->table('thrift_two_win');
        $nbuilder->where('id', $thrift_group_id);
        $query = $nbuilder->get();
        $thrift_group = $query->getrow();

        if ($thrift_group) {
            /*
            * 
            * Thrift date is over
            *
            */

            if (date('Y-m-d') > $thrift_group->thrift_group_end_date) {
                $error = $this->generateError(lang('Thrift.thrift_date_end'));
                return $this
                    ->getResponse(
                        $error,
                        ResponseInterface::HTTP_OK
                    );
            }

            if (is_numeric($thrift_group->thrift_group_member_count)) {
                $thrift_group_member_count = $thrift_group->thrift_group_member_count;
            }
        } else {

            /*
             *
             * Thrift not found
             *
             */

            $error = $this->generateError(lang('Thrift.thrift_not_found'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }


        $tbuilder = $this->db->table('thrift_two_win_member');
        $tbuilder->where('thrift_group_id', $thrift_group_id);
        $tbuilder->where('thrift_group_member_id', CURRENT_USER['id']);
        $query = $tbuilder->get();
        $check_thrift_group = $query->getrow();


        if ($check_thrift_group) {
            $error = $this->generateError(lang('Thrift.already_joined_thrift'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }

        if ($thrift_group->thrift_group_open == 1) {

            /*insert in pg_thrift_group_members */
            $ins_data['thrift_group_id'] = $thrift_group_id;
            $ins_data['thrift_group_member_id'] = CURRENT_USER['id'];
            $ins_data['thrift_group_member_number'] = $thrift_group_member_count + 1;
            $ins_data['thrift_group_member_join_date'] = time();

            /*
             * here a thrift group is complete
             * should be true only once
             *
             * update pg_thrift_group
             */

            $upd_data['thrift_group_member_count'] = $thrift_group_member_count + 1;

            $inserted = false;
            $id = false;

            $pgthriftgroupmember = new Thrifttwowinmember();
            $pgthriftgroupmember->insert($ins_data);
            $id = $pgthriftgroupmember->getInsertID();


            if ($id) {
                $model = new Thrifttwowin();
                $model->where('id', $thrift_group_id)->set($upd_data)->update();
            }

            $this->addReferralBonus($thrift_group);
            $this->checkInvitation($thrift_group_id);

            // $sucess = $this->generateSuccess(lang('Thrift.thrift_join_sucess'), $thrift_group);
            // return $this
            //     ->getResponse(
            //         $sucess
            //     );
        } else {
            $error = $this->generateError(lang('Thrift.thrift_close'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
    }
    public function addReferralBonus($thrift_group){
        
        $referral_amount_model= new Thrifttwowinreferralamount();

        if(CURRENT_USER['referred_by']>0){
            
            $setting_model = new Settings();
            $get_referral_setting= $setting_model->where('settings_key','referral_setting')->first();
            $referral_setting = json_decode($get_referral_setting['settings_value'],true);
            if($referral_setting['referral_enabled']=='yes'){
            $amount = ($thrift_group->thrift_group_product_price * $referral_setting['referral_percentage'])/100;

            $data_insert['user_id']= CURRENT_USER['referred_by'];
            $data_insert['referral_amount']=round($amount,2);
            $data_insert['purpose']='Referral bonus-userid: '.CURRENT_USER['id'];
      
            $insert = $referral_amount_model->save($data_insert);
          
            }
        }

    }

    public function checkInvitation($thrift_group){
        $email= CURRENT_USER['email'];
        $builder = $this->db->table('thrift_two_win_invited_member');

        $builder->set('is_join',1)
        ->where('invited_email',$email)
        ->where('thrift_id', $thrift_group);

        $builder->update();

    }

    private function addPaymentInfo($input){

        $builder = $this->db->table('thrift_two_win_payment_log');
        $data = [];

        $data['thrift_group_id'] = $input['thrift_group_id'];
        $data['deposits_amount'] = $input['deposits_amount'];

        $data['paystack_id'] = $input['paystack_id'];
        $data['payment_type'] = $input['payment_type'];
        $data['payment_info'] = $input['payment_info'];
        $data['deposits_date'] = date('Y-m-d');
        
        $data['user_id'] = CURRENT_USER['id'];
        $data['status'] = 1;

        $builder->insert($data);
      
    }


    /**
     * Lists all the deposits made by current user
     * @return Response
     */

    public function depositsList()
    {
        
        $input = $this->getRequestInput($this->request);
        $isSearch = 0;

        if($input){
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d');
            $isSearch = 1;
            if(isset($input['start_date']) && $input['start_date'] != '' ){
                $start_date =$input['start_date'];
            }
            if(isset($input['end_date']) && $input['end_date'] != '' ){
                $end_date =$input['end_date'];
            }
        }
  
        $builder = $this->db->table('thrift_two_win_deposits');
        $builder->where('user_id', CURRENT_USER['id']);
        if($isSearch == 1){
            $builder->where('deposits_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        }
        $query = $builder->get();
        $deposits = $query->getResultArray();
   
        $sucess = $this->generateSuccess(lang('Account.deposits_list'), $deposits);
        return $this
            ->getResponse(
                $sucess
            );
    }

    /**
     * Lists all the withdrawals made by current user
     * @return Response
     */

    public function withdrawalsList()
    {

        $input = $this->getRequestInput($this->request);
        $isSearch = 0;

        if($input){
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d');
            $isSearch = 1;
            if(isset($input['start_date']) && $input['start_date'] != '' ){
                $start_date =$input['start_date'];
            }
            if(isset($input['end_date']) && $input['end_date'] != '' ){
                $end_date =$input['end_date'];
            }
        }


        $builder = $this->db->table('thrift_two_win_withdraw');
        $builder->select('id, withdraw_amount, DATE_FORMAT(withdraw_date,"%d-%m-%Y") as withdraw_date, user_id, status', false);
        $builder->where('user_id', CURRENT_USER['id']);
        if($isSearch == 1){
            $builder->where('withdraw_date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        }
        $query = $builder->get();
        $withdraw = $query->getResultArray();
        $sucess = $this->generateSuccess(lang('Account.withdraw_list'), $withdraw);
        return $this
            ->getResponse(
                $sucess
            );
    }


    /**
     * Process a withdrawal request
     * @return Response
     */

    public function withdrawals()
    {
        $input = $this->getRequestInput($this->request);
        $rules = [
            'withdraw_amount' => 'required|numeric|greater_than[0]',
            'bank_id' => 'required',
        ];

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }

        $dbuilder = $this->db->table('thrift_two_win_deposits');
        $dbuilder->selectSum('deposits_amount');
        $dbuilder->where('user_id', CURRENT_USER['id']);
        $query = $dbuilder->get();
        $dp_amount = $query->getrow();
        $deposits_amount = 0;
        if($dp_amount){
            $deposits_amount=$dp_amount->deposits_amount;
        }

        $checkStatus = $this->db->table('thrift_two_win_withdraw');
        $checkStatus->where('user_id', CURRENT_USER['id']);
        $checkStatus->orderby('id', 'desc');
        $query = $checkStatus->get();
        $withdraw = $query->getrow();

        $checkStatus = 0;

        if ($withdraw != null) {
            $checkStatus =  $withdraw->status;
        }

        if ($checkStatus == 1) {
            $error = $this->generateError(lang('Account.withdraw_error_due'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }

        $wbuilder = $this->db->table('thrift_two_win_withdraw');
        $wbuilder->selectSum('withdraw_amount');
        $wbuilder->where('user_id', CURRENT_USER['id']);
        $query = $wbuilder->get();
        $withdraw_amount = $query->getrow()->withdraw_amount;

        if ($deposits_amount == null) {
            $deposits_amount = 0;
        }
        if ($withdraw_amount == null) {
            $withdraw_amount = 0;
        }
        $balance =  $deposits_amount - $withdraw_amount;

        if ($input['withdraw_amount'] > $balance) {
            $error = $this->generateError(lang('Account.withdraw_error'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
        $builder = $this->db->table('thrift_two_win_withdraw');
        $bank_id= $input['bank_id'];
        $bankacc_model= new Thrifttowinbankaccount();
        $bank_model= new Thrifttowinbank();
        $get_bank_account = $bankacc_model->where('id',$bank_id)->first();

        if(!empty($get_bank_account)){
        $getBank = $bank_model->where('bank_code',$get_bank_account['bank_code'])->first();  
        $data = [];
        $data['withdraw_amount'] = $input['withdraw_amount'];
        $data['withdraw_date'] = date('Y-m-d H:i:s');
        $data['user_id'] = CURRENT_USER['id'];
        $data['status'] = 1;
        $data['bank_code'] = $get_bank_account['bank_code'];
        $data['bank_name'] = $getBank['bank_name'];
        $data['account_number'] = $get_bank_account['account_number'];
        $data['beneficiary'] = $get_bank_account['beneficiary'];

        if ($builder->insert($data)) { 
            $sucess = $this->generateSuccess(lang('Account.withdraw_saved'), $data);
            return $this
                ->getResponse(
                    $sucess
                );
        } else {
            $error = $this->generateError('Account.withdraw_not_saved');
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
    }else{
        $error = $this->generateError('Account.bank_acc_not_add');
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
    }
    }

    /**
     * Get Current logged in user accout balance
     * that is available for Withdrawals
     * @return Response
     */

    public function getAmount()
    {
        $builder = $this->db->table('thrift_two_win_deposits');
        $builder->selectSum('deposits_amount');
        $builder->where('user_id', CURRENT_USER['id']);
        $query = $builder->get();
        $dp_amount = $query->getrow();
        $deposits_amount = 0;
        if($dp_amount){
            $deposits_amount=$dp_amount->deposits_amount;
        }
        
        $builder = $this->db->table('thrift_two_win_withdraw');
        $builder->selectSum('withdraw_amount');
        $builder->where('user_id', CURRENT_USER['id']);
        $query = $builder->get();
        $wthdraw = $query->getrow();
        $withdraw_amount = 0;

        if ($wthdraw != null) {
            $withdraw_amount =  $wthdraw->withdraw_amount;
        }

        $builder = $this->db->table('thrift_two_win_referral_amount');
        $builder->select('sum(referral_amount) as referral_amount');
        $builder->where('user_id', CURRENT_USER['id']); 
        $query = $builder->get();
        $referral_amount = $query->getResultArray();
        if(empty($referral_amount[0]['referral_amount'])){
            $referral_amount[0]['referral_amount']=0;
        }
        $total_referral = $referral_amount[0]['referral_amount'];
        $balance =  ($total_referral+$deposits_amount) - $withdraw_amount;
        $sucess = $this->generateSuccess(lang('Account.user_current_balance',[ $balance]), [ 'balance'=>$balance]);
        return $this
            ->getResponse(
                $sucess
            );
    }

    /*
    * For internal use
    */

    public function getBanks()
    {

        if (!defined('CURRENT_USER')) {
            $error = $this->generateError(lang('Account.user_not_login'));
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
        $builder = $this->db->table('pg_bank');
        $builder->where('bank_active_status', 1);
        $query = $builder->get();
        $banks = $query->getResultArray();
        $sucess = $this->generateSuccess('Bank List', $banks);
        return $this
            ->getResponse(
                $sucess
            );
    }
    
    public function dashboard() {
        
        $userModel = new UserModel();
        $content_results = $userModel->findUserById(CURRENT_USER['id']);

        //Alter the return values for App
        $content_results['user_dob'] = date('d-m-Y', $content_results['user_dob']);  
 
        $content_thrifts['current_thrift'] = 550000; // demo contents to be replaced when winners api s are completed
        $content_thrifts['available_balance'] = 251500; 
        $content_thrifts['referal_earnings'] = 13600;
        
        $data = ['contents' => $content_results, 'thrifts' => $content_thrifts];
        
        $sucess = $this->generateSuccess('Dasboard Details', $data);
        return $this->getResponse($sucess);
        
    }

    /*****
     * Combination of Winthdrawal and Deposits
     * Contains merged data  TIMESTAMPDIFF(SECOND,
     */

    public function depositsAndWithdrawalList(){
        $now = date('Y-m-d H:i:s');

        $builder = $this->db->table('thrift_two_win_withdraw');
        $builder->select("id, withdraw_amount, DATE_FORMAT(withdraw_date,'%d-%m-%Y') as withdraw_date, user_id, status, TIMESTAMPDIFF(MINUTE,withdraw_date,'$now') as timediff_minutes", false);
        $builder->where('user_id', CURRENT_USER['id']);
        $query = $builder->get();
        $data['withdrawals'] = $query->getResultArray();


        $builder2 = $this->db->table('thrift_two_win_deposits');
        $builder2->select("thrift_two_win_deposits.*, thrift_two_win.id as thrift_id, thrift_two_win.thrift_name, DATE_FORMAT(thrift_two_win_deposits.deposits_date,'%d-%m-%Y') as formatted_deposits_date, TIMESTAMPDIFF(MINUTE,thrift_two_win_deposits.deposits_date,'$now') as timediff_minutes", false);
        $builder2->join('thrift_two_win', 'thrift_two_win.id = thrift_two_win_deposits.thrift_group_id');
        $builder2->where('user_id', CURRENT_USER['id']);
        $query2 = $builder2->get();
        $data['deposits'] = $query2->getResultArray();        

        
        $sucess = $this->generateSuccess(lang('Account.withdraw_deposit_list'), $data); 
        return $this->getResponse($sucess);       
    }

}
