<?php

namespace App\Controllers;

use App\Models\Settings;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ReflectionException;
use CodeIgniter\Events\Events;
use DateTime;
use App\Models\Twofactor;
use App\Models\EmailTemplate;
use App\Models\UserModel;

class HomeController extends BaseController {

    public function index() {
        return view('index_message');
    }

    public function getApi() {
        
        $sucess = $this->generateSuccess('Api get call success.', null);
        return $this->getResponse($sucess);
    }

    public function postApi() {
        $text = $this->request->getPost('text');

        $sucess = $this->generateSuccess('Api post call success.', $text);
        return $this->getResponse($sucess);
    }

    public function getGeneralFields() {

        $builder = $this->db->table('groups');
        $query = $builder->get();
        $roles = $query->getResultArray();

        $results = ['roles' => $roles];

        $sucess = $this->generateSuccess(lang('Home.list_general_fields'), $results);
        return $this->getResponse($sucess);
    }

    public function getUsersByRole($role) {

        $builder = $this->db->table('users');
        $builder->select('users.id, users.first_name, users.last_name, users.email, users.phone, users.user_profile_image, users.active');
        $builder->join('users_groups', 'users.id = users_groups.user_id');
        $builder->join('groups', 'users_groups.group_id = groups.id');
        $builder->where('groups.name', $role);

        $query = $builder->get();
        $results = $query->getResultArray();

        $sucess = $this->generateSuccess(lang('Home.list_users_by_role', [$role]), $results);
        return $this->getResponse($sucess);
    }

    // users not joined in the thrift # for sending thrift invite requests
    public function getUsersThirftInvite($thriftId) {

        $builder = $this->db->table('thrift_two_win_member tm');
        $builder->select('tm.thrift_group_member_id');
        $builder->where('tm.thrift_group_id', $thriftId);
        $query = $builder->get();
        $qResults = $query->getResultArray();
        
        $joinedUsers = [];
        foreach ($qResults as $qResult) {
            array_push($joinedUsers, $qResult['thrift_group_member_id']);
        }       
        
        $builder = $this->db->table('users u');
        $builder->select('u.id, u.first_name, u.last_name, u.email, u.phone, u.user_profile_image, u.active');
        $builder->join('users_groups ug', 'u.id = ug.user_id');
        $builder->join('groups g', 'ug.group_id = g.id');
        $builder->whereNotIn('u.id', $joinedUsers);
        $builder->where('g.name', 'users');
        $builder->orderBy('u.first_name', 'asc');
        $query = $builder->get();
        $results = $query->getResultArray();
        
        $sucess = $this->generateSuccess(lang('Home.list_thirft_invitees'), $results);
        return $this->getResponse($sucess);
    }

    // Get Settings
    public function getSettings() {

        $settings_model = new Settings();

        $get_general_setting = $settings_model->where('settings_key', 'general_setting')->first();
        $general_setting = json_decode($get_general_setting['settings_value'], true);

        $get_payment_setting = $settings_model->where('settings_key', 'payment_setting')->first();
        $payment_setting = json_decode($get_payment_setting['settings_value'], true);

        $get_referral_setting = $settings_model->where('settings_key', 'referral_setting')->first();
        $other_settings = json_decode($get_referral_setting['settings_value'], true);

        $data['general_setting'] = $general_setting;
        $data['payment_setting'] = $payment_setting;
        $data['other_settings'] = $other_settings;

        $sucess = $this->generateSuccess(lang('Home.show_all_settings'), $data);
        return $this->getResponse($sucess);
    }

    public function termsAndConditions() {

        $setting_model = new Settings();
        $get_setting = $setting_model->where('settings_key', 'terms_and_conditions')->first();

        if (!empty($get_setting)) {
            $data = json_decode($get_setting['settings_value'], true);
        }
        $data['terms_and_conditions'] = strip_tags($data['terms_and_conditions']);
        $data['terms_and_conditions'] = str_replace(array("\r\n", "\n\r", "\n", "\r"), '', $data['terms_and_conditions']);

        $sucess = $this->generateSuccess(lang('Home.terms_and_conditions'), $data);
        return $this->getResponse($sucess);
    }

    public function twofactor() {

        $type = $this->request->getPost('type');

        if (!$this->request->getPost('type')) {
            $error = $this->generateError(lang('Home.twofactor_type_mandatory'));
            return $this->getResponse($error, ResponseInterface::HTTP_BAD_REQUEST);
        }
        
        if ($this->request->getPost('type') != 'change_password' && $this->request->getPost('type') != 'withdraw') {
            $error = $this->generateError(lang('Home.twofactor_type_invalid'));
            return $this->getResponse($error, ResponseInterface::HTTP_BAD_REQUEST);
        }

        $twoFactor = new Twofactor();

        $code = rand(10000, 99999);
        
        $data['otp'] = $code; 
        $data['type'] = $type; 
        $data['user_id'] = CURRENT_USER['id']; 

        $isSuccess = $twoFactor->save($data); 

        if ($isSuccess) { 
            $data['id'] = $twoFactor->insertId();
            
            /* SEND OTP TO USER */
            $userModel = new UserModel();
            $user = $userModel->find(CURRENT_USER['id']); 
            $email = $user['email'];
            
            $email_template = new EmailTemplate();
            $template = $email_template->where('email_template_type', 'twofactor_otp')->find();

            $template_message = $template[0]['email_template'];
            $find = array("{{username}}", "{{code}}");
            $replace = array($email, $code);
            $message = str_replace($find, $replace, $template_message);

            $subject = $template[0]['email_template_subject'];
            $send_email = rs_send_email($email, $subject, $message);
            
            /* SEND OTP TO USER --- ENDS */
            
            $sucess = $this->generateSuccess(lang('Home.twofactor_message'), $data);
            return $this->getResponse($sucess);
        } else {
            $error = $this->generateError(lang('Home.something_went_wrong'));
            return $this->getResponse($error, ResponseInterface::HTTP_BAD_REQUEST);
        }
        
    }

}
