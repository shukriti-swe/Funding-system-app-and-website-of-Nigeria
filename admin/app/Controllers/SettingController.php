<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Settings;
use App\Models\EmailTemplate;

class SettingController extends BaseController
{

    public function generalSettings()
    {
        $Settings_model = new Settings();
        $general_setting = $Settings_model->where('settings_key', 'general_setting')->first();
        $data['general_setting'] = $Settings_model->where('settings_id', $general_setting['settings_id'])->first();
        return view('setting/general_setting.php', $data);
    }

    public function updateGeneralSettings()
    {
        if ($this->request->getMethod() == 'post') {

            $Settings_model = new Settings();
            $general_setting = $Settings_model->where('settings_key', 'general_setting')->first();
            $data['general_setting'] = $Settings_model->where('settings_id', $general_setting['settings_id'])->first();

            if ($this->validate('generalsetting')) {

                $name = $this->request->getVar('banner_old');
                $sett = [
                    'site_name' => $this->request->getVar('site_name'),
                    'site_email' => $this->request->getVar('site_email'),
                    'c_symbol' => $this->request->getVar('c_symbol'),
                    'c_text' => $this->request->getVar('c_text'),
                    'site_banner' => $name,
                ];

                $settimg_values = json_encode($sett);
                $data = [
                    'settings_code' => 'general_setting',
                    'settings_key' => 'general_setting',
                    'settings_value' => $settimg_values,
                ];
                $Settings_model = new Settings();

                $general_setting = $Settings_model->where('settings_key', 'general_setting')->first();
                $update = $Settings_model->where('settings_id', $general_setting['settings_id'])->set($data)->update();
                if ($update) {

                    $data['general_setting'] = $Settings_model->where('settings_id', $general_setting['settings_id'])->first();

                    $data['success'] = lang('setting.updated_successfully');
                    return view('setting/general_setting.php', $data);
                }
            } else {
                $data['validation'] = $this->validator;
                return view('setting/general_setting.php', $data);
            }
        } else {
            return view('setting/general_setting.php');
        }
    }

    public function logout()
    {
        $remove_session = [
            'email', 'first_name'
        ];
        $this->session->remove($remove_session);
        $this->session->destroy();
        return redirect()->route('/')->setCookie('login','',time()-90000,'','/');
    }

    public function emailTemplate()
    {
        $email_model = new EmailTemplate();
        $data['email_template'] = $email_model->findall();

        return view('setting/email_template.php', $data);
    }
    
    public function emailTemplateCreate() {
        
        $data = [];
        
        if ($this->request->getMethod() == 'post') {
                    
            $emailModel = new EmailTemplate();
            $lastId = $emailModel->select('email_template_id')->orderBy('email_template_id', 'DESC')->first();
            $lastId = $lastId['email_template_id'];
            $lastId++;
            
            $data['email_template_id'] = $lastId;
            $data['email_template_type'] = $this->request->getVar('email_template_type');
            $data['email_template_subject'] = $this->request->getVar('email_template_subject');
            $data['email_template'] = $this->request->getVar('email_template');
            $emailModel->save($data);
            
            $this->session->setFlashdata('success', 'Email Template created');
            return redirect()->to(base_url('emailtemplate'));
        }
        
        return view('setting/email_template_create.php', $data);
    }

    public function editEmailTemplate($id)
    {
        $email_model = new EmailTemplate();
        $data['email_template'] = $email_model->where('email_template_id', $id)->first();

        if ($this->request->getMethod() == 'post') {
            if ($this->validate('emailtemplate')) {
                
                $datas = [
                    'email_template_type' => $this->request->getVar('email_template_type'),
                    'email_template_subject' => $this->request->getVar('email_template_subject'),
                    'email_template' => $this->request->getVar('email_template'),
                ];

                $update = $email_model->where('email_template_id', $id)->set($datas)->update();
                if ($update) {
                    $data['success'] = lang('setting.updated_successfully');
                    $data['email_template'] = $email_model->where('email_template_id', $id)->first();
                    return view('setting/email_template_form.php', $data);
                }
            } else {
                $data['validation'] = $this->validator;
                return view('setting/email_template_form.php', $data);
            }
        }
        return view('setting/email_template_form.php', $data);
    }

    public function paymentSettings()
    {
        $Settings_model = new Settings();
        $payments_setting = $Settings_model->where('settings_key', 'payment_setting')->first();
        $data['payments_setting'] = $Settings_model->where('settings_id', $payments_setting['settings_id'])->first();


        if ($this->request->getMethod() == 'post') {
            if ($this->validate('paymentsetting')) {

                $inputs = [
                    'paystack_test_mode' => $this->request->getVar('paystack_test_mode'),
                    'paystack_test_secret_key' => $this->request->getVar('paystack_test_secret_key'),
                    'paystack_test_public_key' => $this->request->getVar('paystack_test_public_key'),
                    'paystack_live_secret_key' => $this->request->getVar('paystack_live_secret_key'),
                    'paystack_live_public_key' => $this->request->getVar('paystack_live_public_key'),
                ];

                $input_all = json_encode($inputs);
                $data = [
                    'settings_code' => 'payment_setting',
                    'settings_key' => 'payment_setting',
                    'settings_value' => $input_all,
                ];

                $Settings_model = new Settings();
                $payments_setting = $Settings_model->where('settings_key', 'payment_setting')->first();
                $update = $Settings_model->where('settings_id', $payments_setting['settings_id'])->set($data)->update();
                if ($update) {

                    $data['payments_setting'] = $Settings_model->where('settings_id', $payments_setting['settings_id'])->first();

                    $data['success'] = lang('setting.updated_successfully');
                    return view('setting/payment_settings', $data);
                }
            } else {
                $data['validation'] = $this->validator;
                return view('setting/payment_settings', $data);
            }
        }
        return view('setting/payment_settings',$data);
    }

    public function otherSetting()
    {
        $setting_model = new Settings();
        $get_referral_setting= $setting_model->where('settings_key','referral_setting')->first();
        $data['referral_setting'] = json_decode($get_referral_setting['settings_value'],true);

        if ($this->request->getMethod() == 'post') {

            if ($this->validate('referralsetting')) {
                $referal = [
                    'referral_enabled' => $this->request->getVar('referral_enabled'),
                    'referral_percentage' => $this->request->getVar('referral_percentage'),
                    'potential_winning' => $this->request->getVar('potential_winning'),
                    'thrift_start_days' => $this->request->getVar('thrift_start_days'),
                    'thrift_start_not_later' => $this->request->getVar('thrift_start_not_later'),
                    'thrift_duration_in_month' => $this->request->getVar('thrift_duration_in_month'),
                ]; 
                $settimg_values = json_encode($referal);
                $data = [
                    'settings_code' => 'referral_setting',
                    'settings_key' => 'referral_setting',
                    'settings_value' => $settimg_values,
                ];
                $Settings_model = new Settings();

                $referral_setting = $Settings_model->where('settings_key', 'referral_setting')->first();
                $update = $Settings_model->where('settings_id', $referral_setting['settings_id'])->set($data)->update();
                if ($update) {

                    $get_referral_setting= $setting_model->where('settings_key','referral_setting')->first();
                    $data['referral_setting'] = json_decode($get_referral_setting['settings_value'],true);

                    $data['success'] = lang('setting.updated_successfully');
                    return view('setting/referral_setting.php', $data);
                }

            }else 
            {
            $data['validation'] = $this->validator;
            return view('setting/referral_setting', $data);
       
            }

    }
        return view('setting/referral_setting',$data);
    }

    public function termsAndConditions(){
        $setting_model = new Settings();
        $get_setting= $setting_model->where('settings_key','terms_and_conditions')->first();
        if(!empty($get_setting)){
          $data['termandcon_setting'] = json_decode($get_setting['settings_value'],true);
        }

        if ($this->request->getMethod() == 'post') {
            if ($this->validate('termsandcondition')) {
                $terms = [
                    'terms_and_conditions' => $this->request->getVar('terms_and_conditions'),
                ]; 
                $settimg_values = json_encode($terms);
                $data = [
                    'settings_code' => 'terms_and_conditions',
                    'settings_key' => 'terms_and_conditions',
                    'settings_value' => $settimg_values,
                ];
                $Settings_model = new Settings();

                $termsandcon_setting = $Settings_model->where('settings_key','terms_and_conditions')->first();
                $update = $Settings_model->where('settings_id', $termsandcon_setting['settings_id'])->set($data)->update();
                return redirect()->to(base_url('termsandconditions'))->with('success', 'Terms and conditions updated successfully!');

            }else{
            $data['validation'] = $this->validator;
            return view('setting/terms_and_conditions', $data);
            }
        }
        return view('setting/terms_and_conditions',$data);
    }
    
}
