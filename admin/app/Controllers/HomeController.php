<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ThrifttowinusergroupModel;
use App\Models\Thrifttowingroupmodel;
use Config\Services;

class HomeController extends BaseController {

    // public function home() {
    //     return view('dashbord_page');
    // }
    public function userList() {
        return view('user_list');
    }

    public function createUser() {
        return view('create_user');
    }

    public function writeMessage() {
        return view('write_message');
    }

    public function outbox() {
        return view('outbox');
    }
    public function inbox() {
        return view('inbox');
    }
    public function thriftList() {
        return view('thriftlist');
    }
    public function paymentIssue() {
        return view('payment_issue');
    }
    public function paymentRecieveIssue() {
        return view('payment_recieve_issue');
    }
    
    // setting
    public function generalSettings() {
        return view('general_settings');
    }
    public function contactSettings() {
        return view('contact_settings');
    }
    public function currencySettings() {
        return view('currency_settings');
    }
    public function datetimeSettings() {
        return view('datetime_settings');
    }
    public function systemSettings() {
        return view('system_settings');
    }
    
    public function emailTemplate() {
        return view('email_template');
    }
    public function allBank() {
        return view('all_bank');
    }
    public function addBank() {
        return view('add_bank');
    }

    public function index() {
        $user_model= new UserModel();
        
        if ($this->request->getMethod() == 'post') {


            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $remember = $this->request->getVar('remember');

            

            $group_model =  new Thrifttowingroupmodel();
            $get_group = $group_model->where('name','admin')->orWhere('name','superadmin')->findall();
         

            $builder =$this->db->table('users t1');
            $builder->select('t1.*,t2.group_id');
            $builder->join('users_groups t2', 't2.user_id = t1.id');
            $builder->where('t1.email', $email);
            $builder->where('t2.group_id', $get_group[0]['id']);
            $builder->orWhere('t2.group_id', $get_group[1]['id']);
            $query = $builder->get();
            $check = $query->getResultArray();
            

            if (get_cookie('login') && !$check) {
                $rememberkey = $this->request->getVar('password');
                // $check = $user->where(['email' => $email, 'rememberkey' => $rememberkey])->first();
                $builder =$this->db->table('users t1');
                $builder->select('t1.*,t2.group_id');
                $builder->join('users_groups t2', 't2.user_id = t1.id');
                $builder->where('t1.email', $email);
                $builder->where('t1.remember_code', $rememberkey);
                $query = $builder->get();
                $check = $query->getResultArray();
            }
            
            if ($check) {
                //echo $check[0]['password'];die();
                $verify_pass = password_verify($password, $check[0]['password']);
                
                if ($verify_pass) {
                    $sessData = [
                        'id' => $check[0]['id'],
                        'name' => $check[0]['first_name'] . ' ' . $check[0]['last_name'],
                        'email' => $check[0]['email'],
                        'user_profile_image' => $check[0]['user_profile_image'],
                        'isLoggedIn' => true
                    ];
                    $this->session->set($sessData);
                    if($remember){
                   
                    $get_cookie = $this->setCookie($check);
                 
                    return redirect()->route('dashboard')->setCookie($get_cookie['name'],$get_cookie['value'],$get_cookie['expire'],$get_cookie['domain'],$get_cookie['path']);
                    
                    }else{
                     return redirect()->to(base_url('dashboard'));
                    }
                    
               }
            }

            $this->session->setFlashdata('msg', 'Invalid Credentials');
            return redirect()->to('/');
        }

        $getCookie = get_cookie('login');
        
        if ($getCookie != '') {
            $showGetCookie = base64_decode($getCookie);
            $cookieArray =  explode('|', $showGetCookie);

            $cookieCheck = $user_model->where(['email' => $cookieArray[0], 'remember_code' => $cookieArray[1]])->first();


            if ($cookieCheck) {
                $sessData = [
                    'id' => $cookieCheck['id'],
                    'name' => $cookieCheck['first_name'] . ' ' . $cookieCheck['last_name'],
                    'email' => $cookieCheck['email'],
                    'isLoggedIn' => true
                ];
                $this->session->set($sessData);
                return redirect()->route('dashboard');

            }

      
        }
         $data['error'] = "username and password didn't match!";

         return view('Auth/index',$data);
    }


    public function setCookie($getUser) {
        
        $remCheck = $this->request->getVar('remember');
        $user_model= new UserModel();
        if($remCheck) {
          
            $test['remember_code'] = random_string('alnum', 40);
            $id = $getUser[0]['id'];

            $user_model->update($id, $test);

            $cookie = [
                'name'          => 'login',
                'value'         => base64_encode($getUser[0]['email'] . '|' . $test['remember_code']),
                'expire'        => time() + 86500 * 30,
                'domain'        => '',
                'path'          => '/',
                //'prefix'        => '',
                //'secure'        => false,
                'httpOnly'      => true,
                //'sameSite'      => '',
            ];
            //$this->response->setCookie($cookie)->setHeader('Location','/');
            return $cookie;
        }
    }

}
