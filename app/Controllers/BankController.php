<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\Preuser;
use App\Models\Thrifttwowin;
use App\Models\Thrifttwowinmember;
use App\Models\Thrifttwowininvitedmember;
use App\Models\EmailTemplate;
use App\Models\Settings;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ReflectionException;
use CodeIgniter\Events\Events;
use DateTime; 
use App\Models\Thrifttowinbankaccount;
use App\Models\Thrifttowinuserbvn;

use App\Controllers\BaseController;

class BankController extends BaseController
{
    public function addBank()
    {
        $input = $this->getRequestInput($this->request);
        $rules = [
            'bank_code' => 'required',
            'account_number' => 'required|numeric',
        ];

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }

       
        if($input['beneficiary']==''){
            $user_model = new UserModel();
            $user = $user_model->where('id',CURRENT_USER['id'])->first();
            $input['beneficiary']= $user['first_name'].' '.$user['last_name'];
        }

       
        $data = [];
        $data['user_id'] = CURRENT_USER['id'];
        $data['bank_code'] = $input['bank_code'];
        $data['account_number'] = $input['account_number'];
        $data['beneficiary'] = $input['beneficiary'];
   
        $bankaccount_model = new Thrifttowinbankaccount();
        $get_bank_acc= $bankaccount_model->where('user_id',CURRENT_USER['id'])->first();
        if(!empty($get_bank_acc)){
            $update = $bankaccount_model->update($get_bank_acc['id'],$data);
            if($update){
                $success = $this->generateSuccess(lang('Bank.updated_bank'),$data);
                return $this
                    ->getResponse(
                        $success,
                        ResponseInterface::HTTP_OK
                    );
            }
        }else{
            $insert = $bankaccount_model->save($data);
            if($insert){
                $success = $this->generateSuccess(lang('Bank.add_bank'),$data);
                return $this
                    ->getResponse(
                        $success,
                        ResponseInterface::HTTP_OK
                    );
            }
        }
        
       

    }
    public function getBank()
    {
        $builder = $this->db->table('thrift_two_win_bank_account ba');
        $builder->join('thrift_two_win_bank b', 'ba.bank_code  = b.bank_code');
        $builder->select('ba.*, b.bank_name');
        $builder->where('ba.user_id', CURRENT_USER['id']);
        $query = $builder->get();
        $bank_accounts = $query->getResultArray();
        $data['bank_accounts'] = $bank_accounts;

        $sucess = $this->generateSuccess(lang('Bank.bank_accounts'), $data);
        return $this->getResponse($sucess);
        
    }

    public function editBank()
    {
        $input = $this->getRequestInput($this->request);
        $rules = [
            'id' => 'required',
            'bank_code' => 'required',
            'account_number' => 'required|numeric',
        ];

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }

        if(!array_key_exists('beneficiary',$input)){
            
            $user_model = new UserModel();
            $user = $user_model->where('id',CURRENT_USER['id'])->first();
            $input['beneficiary']= $user['first_name'].' '.$user['last_name'];
        }

   

        $data = [];
        $data['user_id'] = CURRENT_USER['id'];
        $data['bank_code'] = $input['bank_code'];
        $data['account_number'] = $input['account_number'];
        $data['beneficiary'] = $input['beneficiary'];
   
        $bankaccount_model = new Thrifttowinbankaccount();
        $update = $bankaccount_model->update($input['id'],$data);
        if($update){
            $success = $this->generateSuccess(lang('Bank.update'), $data);
            return $this
                ->getResponse(
                    $success,
                    ResponseInterface::HTTP_OK
                );
        }
        
    }
    public function deleteBank()
    {
        $input = $this->getRequestInput($this->request);
        $rules = [
            'id' => 'required',
        ];

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }

        $bankaccount_model = new Thrifttowinbankaccount();
        $delete = $bankaccount_model->where('id', $input['id'])->delete();

        if($delete){
            $success = $this->generateSuccess(lang('Bank.delete'), []);
            return $this
                ->getResponse(
                    $success,
                    ResponseInterface::HTTP_OK
                );
        }
        
    }

    public function userBvn()
    {
        $userbvn_model = new Thrifttowinuserbvn();
        $user_id = CURRENT_USER['id'];
        $get_bvn = $this->getUserBvn($user_id);
        
        if(empty($get_bvn)){

        $input = $this->getRequestInput($this->request);
        $rules = [
            'bank_code' => 'required',
            'account_number' => 'required|numeric',
            'user_bvn' => 'required|numeric|max_length[12]|min_length[11]',
        ];

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
        
        if(!array_key_exists('beneficiary',$input)){
            
            $user_model = new UserModel();
            $user = $user_model->where('id',CURRENT_USER['id'])->first();
            $input['beneficiary']= $user['first_name'].' '.$user['last_name'];
        }

        $data = [];
        $data['user_id'] = CURRENT_USER['id'];
        $data['bank_code'] = $input['bank_code'];
        $data['user_bvn'] = $input['user_bvn'];
        $data['account_number'] = $input['account_number'];
        $data['beneficiary'] = $input['beneficiary'];

        $insert = $userbvn_model->save($data);
        if($insert){
           $get_response = $this->check_account_verification($data);
           $verify_res = json_decode($get_response,true);

            //$success = $this->generateSuccess(lang('Bank.user_bvn'), $data);
            $success = $this->generateSuccess($verify_res['message'], $data);
            
            return $this
                ->getResponse(
                    $success,
                    ResponseInterface::HTTP_OK
                );
        }
    }else if($get_bvn['status']!=1){

        
        $input = $this->getRequestInput($this->request);
        $rules = [
            'bank_code' => 'required',
            'account_number' => 'required|numeric',
            'user_bvn' => 'required|numeric|max_length[12]|min_length[11]',
        ];

        if (!$this->validateRequest($input, $rules)) {
            $error = $this->generateError($this->validator->getErrors());
            return $this
                ->getResponse(
                    $error,
                    ResponseInterface::HTTP_OK
                );
        }
        
        if(!array_key_exists('beneficiary',$input)){
            
            $user_model = new UserModel();
            $user = $user_model->where('id',CURRENT_USER['id'])->first();
            $input['beneficiary']= $user['first_name'].' '.$user['last_name'];
        }

        $data = [];
        $data['user_id'] = CURRENT_USER['id'];
        $data['bank_code'] = $input['bank_code'];
        $data['user_bvn'] = $input['user_bvn'];
        $data['account_number'] = $input['account_number'];
        $data['beneficiary'] = $input['beneficiary'];

        $update = $userbvn_model->update($get_bvn['id'],$data);
        if($update){
           $get_response = $this->check_account_verification($data);
           $verify_res = json_decode($get_response,true);
         
            $data['user_bvn']= $this->getUserBvn($user_id);

            $success = $this->generateSuccess($verify_res['message'], $data);
            return $this->getResponse($success,ResponseInterface::HTTP_OK);
        }

    }else if($get_bvn['status']==1){
        $error = $this->generateError(lang('Bank.user_bvn_success_and_processed'));
        return $this
            ->getResponse(
                $error,
                ResponseInterface::HTTP_OK
            );
    }

    }

    public function check_account_verification($data){
        $user_model = new UserModel();
        $Settings_model = new Settings();

        //Convert to first name and last name
        $firstname = $lastname = '';
        $name = explode(',',$data['beneficiary']);
        $firstname = trim($name[0]);

        if(isset($name[1]))
            $lastname = trim($name[1]);

        $user = $user_model->where('id',$data['user_id'])->first();
        $url = "https://api.paystack.co/customer/".$user['pay_customer_id']."/identification";

        $payments_setting = $Settings_model->where('settings_key', 'payment_setting')->first();
        
        $results = json_decode($payments_setting['settings_value']);
        if($results->paystack_test_mode == 'On'){
            $SECRET_KEY = $results->paystack_test_secret_key;
        }else{
            $SECRET_KEY = $results->paystack_live_secret_key;
        }
       
        $fields = [
          "country"=> "NG",
          "type"=> "bank_account",
          "account_number"=> $data['account_number'],
          "bvn"=> $data['user_bvn'],
          "bank_code"=> $data['bank_code'],
          "first_name"=> $firstname,
          "last_name"=> $lastname
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
        curl_close($ch);
      
        return $result;
    }

    /**
     * Paystack webhook
     * Need to process webhook response
     */
    public function webHookPaystack(){
        $user_model = new UserModel();
        $user_bvn_model = new Thrifttowinuserbvn();
        $bankaccount_model = new Thrifttowinbankaccount();

       $data = file_get_contents('php://input');

       //For now just email data to test
       rs_send_email('khorshed@obsvirtual.com', 'BVN Webhook Response test', $data);       
     
       $get_paystack_response = json_decode($data,true);

      $pay_customer_id = $get_paystack_response['data']['customer_code'];
      
      $get_user = $user_model->where('pay_customer_id',$pay_customer_id)->first();
     
      if(!empty($get_user)){
        $update_data['report'] = $data;
        if($get_paystack_response['event'] == 'customeridentification.success'){
            $update_data['status'] = 1;
        }else{
            $update_data['status'] = 2;
        }
    
       $update = $user_bvn_model->where('user_id', $get_user['id'])->set($update_data)->update();
    
      if($update){
        $get_user_bvn =   $user_bvn_model->where('user_id', $get_user['id'])->first();
       
        // IF Success add that bank to user bank .. Added Temporarily
        if($update_data['status'] == 1){
          
            $datas['user_id'] = $get_user_bvn['user_id'];
            $datas['bank_code'] = $get_user_bvn['bank_code'];
            $datas['account_number'] = $get_user_bvn['account_number'];
            $datas['beneficiary'] = $get_user_bvn['beneficiary'];  
            $insert = $bankaccount_model->save($datas);          
        }
    
        $success = $this->generateSuccess(lang('Bank.user_bvn_report_success'), $get_user_bvn);
        return $this->getResponse($success,ResponseInterface::HTTP_OK);
        }
      }else{
        $error = $this->generateError(lang('Bank.no_pay_customer_id_found'));
        return $this
            ->getResponse(
                $error,
                ResponseInterface::HTTP_OK
            );
      }

    }

    public function userBvnStatus(){
        $userbvn_model = new Thrifttowinuserbvn();
        $user_id = CURRENT_USER['id'];
        
        $get_user_bvn= $this->getUserBvn($user_id);
        if(empty($get_user_bvn)){

            $error = $this->generateError(lang('Bank.user_bvn_not_set'));
                return $this
                    ->getResponse(
                        $error,
                        ResponseInterface::HTTP_OK
                    );
        }else if(!empty($get_user_bvn['report'])){
            $report = json_decode($get_user_bvn['report']);

            if($report->event == 'customeridentification.success'){
                $data['status']= 1;
                $userbvn_model->where('user_id', $user_id)->set($data)->update();

                $data['user_bvn']= $this->getUserBvn($user_id);
                $success = $this->generateSuccess(lang('Bank.user_bvn_status_success'), $data);
            return $this->getResponse($success,ResponseInterface::HTTP_OK);
            }else if($report->event == 'customeridentification.failed'){
                $data['status']= 2;
                $userbvn_model->where('user_id', $user_id)->set($data)->update();
                $data['user_bvn']= $this->getUserBvn($user_id);
                
                $error = $this->generateError(lang('Bank.user_bvn_status_failed'), $data);
                return $this
                    ->getResponse(
                        $error,
                        ResponseInterface::HTTP_OK
                    );
            }
        }else{
            $data['user_bvn']= $this->getUserBvn($user_id);
            $success = $this->generateSuccess(lang('Bank.user_bvn_status_process'), $data);
            return $this->getResponse($success,ResponseInterface::HTTP_OK);
        }
        


     }

     public function getUserBvn($user_id){

        $userbvn_model = new Thrifttowinuserbvn();
        $get_bVn = $userbvn_model->where('user_id', $user_id)->first();
        return $get_bVn;
     }

}
