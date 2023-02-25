<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\GroupmemberModel;
use App\Models\UserdetailsModel;
use App\Models\UserVerification;
use App\Models\Pgproduct;
use App\Models\Pgthriftgroupmember;
use App\Models\Pgthriftgroup;
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
use App\Models\Twofactor;

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
            return $this->getResponse($error,ResponseInterface::HTTP_OK);
        }

        $nbuilder = $this->db->table('thrift_two_win_member');
        $nbuilder->where('thrift_group_member_id', CURRENT_USER['id']);
        $nbuilder->where('thrift_group_id', $input['thrift_group_id']);
        $query = $nbuilder->get();
        $thrift_two_win_member = $query->getrow();

        if ($thrift_two_win_member) {
        /* User already joined this thrift. */
            $error = $this->generateError(lang('Thrift.already_joined_thrift'));
            return $this->getResponse($error,ResponseInterface::HTTP_OK);
        }

        $nbuilder = $this->db->table('thrift_two_win');
        $nbuilder->where('id', $input['thrift_group_id']);
        $query = $nbuilder->get();
        $thrift_group = $query->getrow();

        if (!$thrift_group) {

        /* Thrift not found */
            $error = $this->generateError('No thrift Found.');
            return $this->getResponse($error,ResponseInterface::HTTP_OK);
        }

        /* Thrift date is over */
        if (date('Y-m-d') > $thrift_group->thrift_group_end_date) {
            $error = $this->generateError(lang('Thrift.thrift_date_end'));
            return $this->getResponse($error,ResponseInterface::HTTP_OK);
        }

        /* ------------JOIN THRIFT--IF PAYMENT SUCCESS------------------------*/

        $thrift_group_member_count = $thrift_group->thrift_group_member_count;
        $thrift_group_member_count++;

        $insertData = ['thrift_group_id' => $input['thrift_group_id'], 'thrift_group_member_id' => CURRENT_USER['id'], 'thrift_group_member_number' => $thrift_group_member_count, 'thrift_group_member_join_date' => time()];
        $pgthriftgroupmember = new Thrifttwowinmember();
        $pgthriftgroupmember->insert($insertData);
        $id = $pgthriftgroupmember->getInsertID();

        if ($id) {
            $model = new Thrifttwowin();
            $model->where('id', $input['thrift_group_id'])->set(['thrift_group_member_count' =>  $thrift_group_member_count])->update();
        }

        $this->checkInvitation($input['thrift_group_id']);

        /* -----------------JOIN THRIFT ENDS----------------------------------*/

        $nbuilder = $this->db->table('thrift_two_win_member');
        $nbuilder->where('thrift_group_member_id', CURRENT_USER['id']);
        $nbuilder->where('thrift_group_id', $input['thrift_group_id']);
        $query = $nbuilder->get();
        $thrift_two_win_member = $query->getrow();

        if (!$thrift_two_win_member) {
        /* User already joined this thrift. */
            $error = $this->generateError(lang('Account.not_join_in_thrift'));
            return $this->getResponse($error,ResponseInterface::HTTP_OK);
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

            //Get thrift details
            $thrift_info = $this->getThriftDetails($input['thrift_group_id']);

            $sucess = $this->generateSuccess(lang('Account.deposits_sucessfull'), $thrift_info);
            return $this->getResponse($sucess);
        } else {
            $error = $this->generateError(lang('Account.deposit_not_saved'));
            return $this->getResponse($error,ResponseInterface::HTTP_OK);
        }
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

    public function withdrawals() {
        
        $input = $this->getRequestInput($this->request);
        $rules = [
            'withdraw_amount' => 'required|numeric|greater_than[0]',
            //'otp' => 'required|min_length[5]',
        ];

        // if (!$this->validateRequest($input, $rules)) {
        //     $error = $this->generateError($this->validator->getErrors());
        //     return $this->getResponse($error, ResponseInterface::HTTP_OK);
        // }

        // $isValidOtp = $this->validateOtp($input['otp']);
        // if (!$isValidOtp) {
        //     $error = $this->generateError(lang('Auth.otp_invalid'));
        //     return $this->getResponse($error, ResponseInterface::HTTP_BAD_REQUEST);
        // }
        
        $dbuilder = $this->db->table('thrift_two_win_deposits');
        $dbuilder->selectSum('deposits_amount');
        $dbuilder->where('user_id', CURRENT_USER['id']);
        $query = $dbuilder->get();
        $dp_amount = $query->getrow();
        $deposits_amount = 0;
        if ($dp_amount) {
            $deposits_amount = $dp_amount->deposits_amount;
        }

        $checkStatus = $this->db->table('thrift_two_win_withdraw');
        $checkStatus->where('user_id', CURRENT_USER['id']);
        $checkStatus->orderby('id', 'desc');
        $query = $checkStatus->get();
        $withdraw = $query->getrow();

        $checkStatus = 0;

        if ($withdraw != null) {
            $checkStatus = $withdraw->status;
        }

        if ($checkStatus == 1) {
            $error = $this->generateError(lang('Account.withdraw_error_due'));
            return $this->getResponse($error, ResponseInterface::HTTP_OK);
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

        $balance = $deposits_amount - $withdraw_amount;

        if ($input['withdraw_amount'] > $balance) {
            $error = $this->generateError(lang('Account.withdraw_error'));
            return $this->getResponse($error, ResponseInterface::HTTP_OK);
        }

        $bankacc_model = new Thrifttowinbankaccount();
        $get_bank = $bankacc_model->where('user_id', CURRENT_USER['id'])->first();

        if (!empty($get_bank)) {
            $bank_id = $get_bank['id'];
        } else {
            $error = $this->generateError(lang('Account.bank_acc_not_add'));
            return $this->getResponse($error, ResponseInterface::HTTP_OK);
        }

        $builder = $this->db->table('thrift_two_win_withdraw');

        $bank_model = new Thrifttowinbank();
        $get_bank_account = $bankacc_model->where('id', $bank_id)->first();

        if (!empty($get_bank_account)) {
            
            $getBank = $bank_model->where('bank_code', $get_bank_account['bank_code'])->first();
            $data = [];
            $data['withdraw_amount'] = $input['withdraw_amount'];
            $data['withdraw_date'] = date('Y-m-d H:i:s');
            $data['user_id'] = CURRENT_USER['id'];
            $data['status'] = 1;
            $data['bank_code'] = $get_bank_account['bank_code'];

            if ($getBank) {
                $data['bank_name'] = $getBank['bank_name'];
            }

            $data['account_number'] = $get_bank_account['account_number'];
            $data['beneficiary'] = $get_bank_account['beneficiary'];

            if ($builder->insert($data)) {
                
                $twoFactorModel = new Twofactor();
                //$twoFactorModel->where(['otp' => $input['otp'], 'type' => 'withdraw', 'read' => 0, 'user_id' => CURRENT_USER['id']])->set(['read' => 1])->update();
                
                $data['account_status'] = $this->getUserWallet();

                $sucess = $this->generateSuccess(lang('Account.withdraw_saved'), $data);
                return $this->getResponse($sucess);
            } else {
                $error = $this->generateError('Account.withdraw_not_saved');
                return $this->getResponse($error, ResponseInterface::HTTP_OK);
            }
        } else {

            $error = $this->generateError('Account.bank_acc_not_add');
            return $this->getResponse($error, ResponseInterface::HTTP_OK);
        }
    }

    /**
     * Get Current logged in user accout balance
     * that is available for Withdrawals
     * @return Response
     */

    public function getAmount() {
        $info = $this->getUserWallet();
        $sucess = $this->generateSuccess(lang('Account.user_current_balance',[ $info['available_balance']]), $info);
        return $this->getResponse($sucess);
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

        $info = $this->getUserWallet();

        $content_thrifts['current_thrift'] = $info['current_thrift']; // demo contents to be replaced when winners api s are completed
        $content_thrifts['available_balance'] = $info['available_balance'];
        $content_thrifts['referral_earnings'] = $info['referral_earnings'];

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

    public function getThriftDetails($id){

        $nbuilder = $this->db->table('thrift_two_win tw');
        $nbuilder->join('users u', 'tw.created_member = u.id');
        $nbuilder->select('tw.*, u.first_name, u.last_name, u.email, u.user_profile_image, u.user_gender');
        $nbuilder->where('tw.id', $id);
        $query = $nbuilder->get();
        $thrift_group = $query->getrow();

        if ($thrift_group) {
            // For now it's fixed,
            $thrift_group->interest_rate = 5;

            if($thrift_group->thrift_group_open == 1){
                $start_date =  new DateTime($thrift_group->thrift_group_start_date);
                $start_date_timestamp = $start_date->getTimestamp();
                if(time()>$start_date_timestamp){
                    $end_date =  new DateTime($thrift_group->thrift_group_end_date);
                    $end_date_timestamp = $end_date->getTimestamp();
                    $thrift_group->status='Ongoing';
                    $thrift_group->expire_remaining_time=$end_date_timestamp-time();
                }else{
                    $thrift_group->status='Pending';
                    $thrift_group->start_remaining_time=$start_date_timestamp-time();
                }

            }else{
                $thrift_group->status='Completed';
                //GET THE WINNER DETAILS
                $winner = $this->getThriftWinner($thrift_group->id);
                if($winner){
                    $thrift_group->winner = $winner;
                }
              }

            $tbuilder = $this->db->table('thrift_two_win_member');
            $tbuilder->select('users.id,users.first_name,users.last_name,users.phone, users.user_profile_image, users.user_gender');
            $tbuilder->join('users', 'thrift_two_win_member.thrift_group_member_id = users.id');
            $tbuilder->where('thrift_two_win_member.thrift_group_id', $id);
            $query = $tbuilder->get();
            $allMember = $query->getResultArray();
            $thrift_group->members = $allMember;

            $thrift_group->potential_winnings = 'No members yet';

            if($allMember){
                $total_thrift_members = count($allMember);
                $amount_total = $total_thrift_members *  $thrift_group->thrift_group_product_price * ($thrift_group->interest_rate / 100) * ($thrift_group->thrift_group_term_duration/12);
                $thrift_group->potential_winnings = round($amount_total,2 );
            }

            //Check if user alredy joined thrift
            $tbuilder = $this->db->table('thrift_two_win_member');
            $tbuilder->where('thrift_two_win_member.thrift_group_id', $id);
            $tbuilder->where('thrift_two_win_member.thrift_group_member_id', CURRENT_USER['id']);
            $query = $tbuilder->get();
            $isMember = $query->getResultArray();
            if(is_array($isMember) && count($isMember)){
                $thrift_group->joined = true;
            }else{
                $thrift_group->joined = false;
            }

            return $thrift_group;
        }
    }

    private function getUserWallet(){
        
        $builder = $this->db->table('thrift_two_win_deposits');
        $builder->selectSum('deposits_amount');
        $builder->where('user_id', CURRENT_USER['id']);
        $query = $builder->get();
        $dp_amount = $query->getrow();
        $deposits_amount = 0;

        if ($dp_amount) {
            $deposits_amount = $dp_amount->deposits_amount;
        }

        $builder = $this->db->table('thrift_two_win_withdraw');
        $builder->selectSum('withdraw_amount');
        $builder->where('user_id', CURRENT_USER['id']);
        $query = $builder->get();
        $wthdraw = $query->getrow();
        $withdraw_amount = 0;

        if ($wthdraw != null) {
            $withdraw_amount = $wthdraw->withdraw_amount;
        }

        $builder = $this->db->table('thrift_two_win_referral_amount');
        $builder->select('sum(referral_amount) as referral_amount');
        $builder->where('user_id', CURRENT_USER['id']);
        $query = $builder->get();
        $referral_amount = $query->getResultArray();

        if (empty($referral_amount[0]['referral_amount'])) {
            $referral_amount[0]['referral_amount'] = 0;
        }

        $total_referral = $referral_amount[0]['referral_amount'];
        $balance = ($total_referral + $deposits_amount) - $withdraw_amount;

        //Get Active thrift amount
        $active_amount = $this->getUserActiveThriftAmount(CURRENT_USER['id']);

        return [
            'available_balance' => $balance,
            'referral_earnings' => $total_referral,
            'current_thrift' => $active_amount
        ];
    }

    private function getThriftWinner($thriftid){
        $spc = new \Thrift();
        $winner = $spc->getThriftWinner($thriftid);
        return $winner;
    }

    private function getUserActiveThriftAmount($userid){
        $spc = new \Thrift();
        $ac_amount = $spc->getUserActiveThriftAmount($userid);
        return $ac_amount;
    }


    public function checkInvitation($thrift_group){

        $email= CURRENT_USER['email'];

        $builder = $this->db->table('thrift_two_win_invited_member');
        $builder->set('is_join',1)->where('invited_email',$email)->where('thrift_id', $thrift_group);
        $builder->update();

    }

    private function validateOtp($otp) {

        $twoFactorModel = new Twofactor();
        $getOtp = $twoFactorModel->where(['otp' => $otp, 'type' => 'withdraw', 'read' => 0, 'user_id' => CURRENT_USER['id']])->first();

        if ($getOtp) {
            return true;
        } else {
            return false;
        }
    }

}
