<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\Groupsmodel;
use App\Models\UserGroup;

class UserController extends BaseController {

    public function userList() {

        $groupModel = new Groupsmodel();
        $data['groups'] = $groupModel->where('name !=', 'superadmin')->findAll();

        return view('User/list', $data);
    }

    public function getUsersByAjax() {

        $users = array();

        $requestData = $_REQUEST;
 
        $columns[0] = 'first_name';
        $columns[1] = 'last_name';
        $columns[2] = 'email';
        $columns[3] = 'group';
        $columns[4] = 'active';
        $columns[5] = 'created_at';
        $columns[6] = 'last_login';
        $columns[7] = 'actions';

        $common_filter_value = false;
        $order_column = false;

        $specific_filters = array();
        $specific_filters = false;

        if (!empty($requestData['columns'][0]['search']['value'])) {
            $specific_filters['first_name'] = $requestData['columns'][0]['search']['value'];
            
        }

        if (!empty($requestData['columns'][1]['search']['value'])) {
            $specific_filters['last_name'] = $requestData['columns'][1]['search']['value'];
        }

        if (!empty($requestData['columns'][2]['search']['value'])) {
            $specific_filters['email'] = $requestData['columns'][2]['search']['value'];
        }

        if (!empty($requestData['columns'][3]['search']['value'])) {
            $specific_filters['group'] = $requestData['columns'][3]['search']['value'];
        }

        if (!empty($requestData['columns'][4]['search']['value'])) {
            $specific_filters['active'] = $requestData['columns'][4]['search']['value'];
            
            if($specific_filters['active']==10){
                $specific_filters['active']=0;
            }
        }

        if (!empty($requestData['columns'][5]['search']['value'])) {
            $specific_filters['created_at'] = $requestData['columns'][5]['search']['value'];
        }

        if (!empty($requestData['columns'][6]['search']['value'])) {
            $specific_filters['last_login'] = $requestData['columns'][6]['search']['value'];
        }

        if (!empty($requestData['columns'][7]['search']['value'])) {
            $specific_filters['actions'] = $requestData['columns'][7]['search']['value'];
        }

        if (!empty($requestData['search']['value'])) {
            $common_filter_value = $requestData['search']['value'];
        }

        if ($specific_filters == true || !empty($specific_filters)) {
            $common_filter_value = false; //either search with specific filters or with common filter
        }

        $order['column'] = $columns[$requestData['order'][0]['column']];
        $order['by'] = $requestData['order'][0]['dir'];

        $limit['start'] = $requestData['start'];
        $limit['length'] = $requestData['length'];

        $builder = $this->db->table('users');
        $query = $builder->get();
        $users = $query->getResultArray();

        $totalData = count($users);

        $builder = $this->db->table('users u');
        $builder->select('u.id, u.first_name, u.last_name, u.email, u.active, u.created_at, u.last_login, ug.group_id, g.name as groups');
        $builder->join('users_groups ug', 'u.id = ug.user_id');
        $builder->join('groups g', 'ug.group_id = g.id');
        $builder->limit($limit['length'], $limit['start']);
        $query = $builder->get();
        $users = $query->getResultArray();

        if ($users == false || empty($users) || $users == null) {
            $users = false;
        }

        


        if ($common_filter_value == true || $specific_filters == true) {

            $builder = $this->db->table('users u');
            $builder->select('u.id, u.first_name, u.last_name, u.email, u.active, u.created_at, u.last_login, ug.group_id, g.name as groups');
            $builder->join('users_groups ug', 'u.id = ug.user_id');
            $builder->join('groups g', 'ug.group_id = g.id');
            //$totalFiltered = $totalData;

            if ($specific_filters != false) {
                foreach ($specific_filters as $column_name => $filter_value) {
        
                  if ($column_name == 'first_name') {
                    $builder->where('u.first_name', $filter_value);
                  }
                  if ($column_name == 'last_name') {
                    $builder->where('u.last_name', $filter_value);
                  }
                  if ($column_name == 'email') {
                    $builder->where('u.email', $filter_value);
                  }
                  if ($column_name == 'group') {
                    $builder->like(array('ug.group_id' => $filter_value));
                  }
                  if ($column_name == 'active') {
                    $builder->like(array('u.active' => $filter_value));
                  }
                }
              }

            if ($common_filter_value != false) {
            $builder->like(array('u.first_name' => $common_filter_value));
            $builder->like(array('u.last_name' => $common_filter_value));
            $builder->orLike(array('u.email' => $common_filter_value));
            $builder->orLike(array('u.active' => $common_filter_value));
            $builder->orLike(array('u.created_at' => $common_filter_value));
            $builder->orLike(array('u.last_login' => $common_filter_value));
            $builder->orLike(array('ug.group_id' => $common_filter_value));
            $builder->orLike(array('g.name' => $common_filter_value));
            }
            $builder->limit($limit['length'], $limit['start']);
            $builder = $builder->get();
            $users = $builder->getResultArray();
            $totalFiltered = count($users);
        }
        if (!empty($totalFiltered)) {
            $totalFiltered = $totalFiltered;
          } else {
            $totalFiltered = $totalData;
          }

          if ($users) {
            $i = 0;
            foreach ($users as $user) {
                $users[$i]['active'] = ($user['active']) ? 'Active' : 'Inactive';
                $users[$i]['last_login'] = ($user['last_login']) ? date('d-m-Y', strtotime($user['last_login'])) : 'Never logged in';
                $users[$i]['actions'] = ''
                        . '<a title="View Profile" href="' . base_url() . '/admin/user/profile/' . $user['id'] . '" style="color:#2b2b2b"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>  <a title="View Profile" href="' . base_url() . '/admin/user/edit/' . $user['id'] . '" style="color:#2b2b2b"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>'
                        . '';
                $i++;
            }
        }

        $json_data['draw'] = intval($requestData['draw']);
        $json_data['recordsTotal'] = intval($totalData);
        $json_data['recordsFiltered'] = intval($totalFiltered);
        $json_data['data'] = $users;

        echo(json_encode($json_data));
    }

    public function userCreate() {

        if ($this->request->getMethod() == 'post') {

            $userModel = new UserModel();
            $data['first_name'] = $this->request->getPost('first_name');
            $data['last_name'] = $this->request->getPost('last_name');
            $data['email'] = $this->request->getPost('email');

            $password = '12345678';
            $data['password'] = password_hash($password, PASSWORD_BCRYPT);
            $data['mem_id_num'] = $this->getThrifterIdNum($data['first_name'], $data['last_name']);
            $userModel->save($data);

            $userGroupModel = new UserGroup();
            $ug['user_id'] = $userModel->getInsertID();
            $ug['group_id'] = $this->request->getPost('role');
            $userGroupModel->save($ug);

            // -------------------SEND PASSWORD AS EMAIL TO CREATED USER ---------------------------
            // -------------------CODE GOES HERE--------------------------- $password
            // -------------------SEND PASSWORD AS EMAIL TO CREATED USER ---------------------------

            $this->session->setFlashdata('success', 'User created &  credentials send to user email');
            return redirect()->to(base_url('admin/user/create'));
        }

        $groupModel = new Groupsmodel();
        $data['groups'] = $groupModel->where('name !=', 'superadmin')->findAll();

        return view('User/create', $data);
    }

    public function userProfile($userId = null) {
 
        $id = ($userId) ? $userId : session()->get('id');
        
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);
        
        $builder = $this->db->table('thrift_two_win_member tm');
        $builder->select('t.*');
        $builder->join('users u', 'tm.thrift_group_member_id = u.id');
        $builder->join('thrift_two_win t', 'tm.thrift_group_id = t.id');
        $builder->where('tm.thrift_group_member_id', $userId);
        $builder = $builder->get();
        $thrifts_details = $builder->getResultArray();
    
        $today = date('Y-m-d');
        $running_thrift = array();
        $complete_thrift = array();
        foreach($thrifts_details as $thrifts){
            if($thrifts['thrift_group_end_date'] >= $today){
              $running_thrift[] = $thrifts['id'];
            }else if($thrifts['thrift_group_end_date'] < $today){
                $complete_thrift[] = $thrifts['id'];
            }
        }

        $builder = $this->db->table('thrift_two_win_referral_amount');
        $builder->select('sum(referral_amount) as referral_amount');
        $builder->where('user_id', $userId); 
        $query = $builder->get();
        $referral_amount = $query->getResultArray();
        if(empty($referral_amount[0]['referral_amount'])){
            $referral_amount[0]['referral_amount']=0;
        }

        $data['running_thrift'] = count($running_thrift);
        $data['complete_thrift'] = count($complete_thrift);
        $data['available_balance'] = $this->getAmount($referral_amount[0]['referral_amount'],$userId);
        return view('User/profile', $data);
    }
    public function getAmount($referral_amount,$user_id)
    {
        $builder = $this->db->table('thrift_two_win_deposits');
        $builder->selectSum('deposits_amount');
        $builder->where('user_id', $user_id);
        $query = $builder->get();
        $dp_amount = $query->getrow();
        $deposits_amount = 0;
        if($dp_amount){
            $deposits_amount=$dp_amount->deposits_amount;
        }
        
        $builder = $this->db->table('thrift_two_win_withdraw');
        $builder->selectSum('withdraw_amount');
        $builder->where('user_id', $user_id);
        $query = $builder->get();
        $wthdraw = $query->getrow();
        $withdraw_amount = 0;

        if ($wthdraw != null) {
            $withdraw_amount =  $wthdraw->withdraw_amount;
        }

        $balance =  ($deposits_amount+$referral_amount) - $withdraw_amount;
        return $balance;
    }

    public function updateUserStatus() {

//        $userModel = new UserModel();
//        $data['user'] = $userModel->find($_SESSION['id']);

        $json_data = ['user' => 'name', 'status' => 'active'];

        echo(json_encode($json_data));
    }

    /**
     * Internal function, not directly called from API
     * @return Response
     */
    private function getThrifterIdNum($f_name, $l_name) {

        $userModel = new UserModel();
        if (!$f_name) {
            $f_name = 'X';
        } else {
            $f_name = ucfirst($f_name[0]);
        }

        if (!$l_name) {
            $l_name = 'X';
        } else {
            $l_name = ucfirst($l_name[0]);
        }


        $mem_id_num = 'T' . $this->alphaNum(5, false, true) . $f_name . $l_name;

        $exists = $userModel->findUserByMemberbyNum($mem_id_num);
        if ($exists) {
            $x = $this->getThrifterIdNum($f_name, $l_name);
        } else {
            return $mem_id_num;
        }
        return $x;
    }

    private function alphaNum($length = false, $only_alphabets = false, $only_integers = false) {
        if (!$length) {
            $length = 8;
        }

        $alphabets = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $integers = '0123456789';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        if ($only_alphabets) {
            $characters = $alphabets;
        }

        if ($only_integers) {
            $characters = $integers;
        }

        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    public function getThriftsByAjax($user_id){
       
        $thrifts = array();
        $requestData = $_REQUEST;
    
    
        $common_filter_value = false;
        $order_column = false;
    
        $specific_filters = array();
        $specific_filters = false;
     
  
    
        if (!empty($requestData['search']['value'])) {
    
          $common_filter_value = $requestData['search']['value'];
        }
    
        $limit['start'] = $requestData['start'];
        $limit['length'] = $requestData['length'];
        $today = date('Y-m-d');
    
        $builder = $this->db->table('thrift_two_win_member tm');
        $builder->select('t.id,t.thrift_name,t.thrift_group_start_date,t.thrift_group_end_date,CONCAT(u.first_name, " ", u.last_name) AS user_name, u.email');
        $builder->join('users u', 'tm.thrift_group_member_id = u.id');
        $builder->join('thrift_two_win t', 'tm.thrift_group_id = t.id');
        $builder->where('tm.thrift_group_member_id', $user_id);
        $builder->where('t.thrift_group_end_date >=',$today);
        $builder = $builder->get();
        $thrifts = $builder->getResultArray();
        $totalData = count($thrifts);
    
        $builder = $this->db->table('thrift_two_win_member tm');
        $builder->select('t.id,t.thrift_name,t.thrift_group_start_date,t.thrift_group_end_date,CONCAT(u.first_name, " ", u.last_name) AS user_name, u.email');
        $builder->join('users u', 'tm.thrift_group_member_id = u.id');
        $builder->join('thrift_two_win t', 'tm.thrift_group_id = t.id');
        $builder->where('tm.thrift_group_member_id', $user_id);
        $builder->where('t.thrift_group_end_date >=',$today);
        $builder->limit($limit['length'],$limit['start']);
        $builder = $builder->get();
        $thrifts = $builder->getResultArray();

        
    
        
    
        if ($common_filter_value == true || $specific_filters == true) {
    
            $builder = $this->db->table('thrift_two_win_member tm');
            $builder->select('t.id,t.thrift_name,t.thrift_group_start_date,t.thrift_group_end_date,CONCAT(u.first_name, " ", u.last_name) AS user_name, u.email');
            $builder->join('users u', 'tm.thrift_group_member_id = u.id');
            $builder->join('thrift_two_win t', 'tm.thrift_group_id = t.id');
            $builder->where('tm.thrift_group_member_id', $user_id);
            $builder->where('t.thrift_group_end_date >=',$today);
            // $builder->like(array('tm.thrift_group_member_id'=> $user_id));
            // $builder->like(array('t.thrift_group_end_date'=> $today));
          if ($specific_filters != false) {
            // foreach ($specific_filters as $column_name => $filter_value) {
    
            //   if ($column_name == 'email') {
            //     $builder->like(array('users.email' => $filter_value));
            //   }
            // }
          }
    
          if ($common_filter_value != false) {
            //$this->db->group_start();
            $builder->havingLike('t.id', $common_filter_value); 
            $builder->orHavingLike('t.thrift_name', $common_filter_value);
            $builder->orHavingLike('t.thrift_group_start_date', $common_filter_value);
            $builder->orHavingLike('t.thrift_group_end_date', $common_filter_value);
            $builder->orHavingLike('user_name', $common_filter_value);
            $builder->orHavingLike('u.email', $common_filter_value);
          }
          
          $builder = $builder->get();
          $thrifts = $builder->getResultArray();
          //echo $this->db->getLastQuery();die();
          $totalFiltered = count($thrifts);
        }
    
        if (!empty($totalFiltered)) {
          $totalFiltered = $totalFiltered;
        } else {
          $totalFiltered = $totalData;
        }
       
        if ($thrifts == false || empty($thrifts) || $thrifts == null) {
          $thrifts = false;
        }
       if($thrifts){

        foreach($thrifts as $key=>$val){
           $date_string1=date_create($val['thrift_group_start_date']);
           $thrifts[$key]['thrift_group_start_date'] = date_format($date_string1,"d-m-Y");

           $date_string2=date_create($val['thrift_group_end_date']);
           $thrifts[$key]['thrift_group_end_date'] = date_format($date_string2,"d-m-Y");
        }
       }
      
    
        $json_data['draw'] = intval($requestData['draw']);
        $json_data['recordsTotal'] = intval($totalData);
        $json_data['recordsFiltered'] = intval($totalFiltered);
        $json_data['data'] = $thrifts;
    
        echo (json_encode($json_data));
    }
    
    public function userEdit($user_id){
        $user_model = new UserModel();
        $groupModel = new Groupsmodel();
        $userGroupModel = new UserGroup();

        $data['groups'] = $groupModel->where('name !=', 'superadmin')->findAll();
        $data['user_group'] = $userGroupModel->where('user_id', $user_id)->first();
        $data['user'] = $user_model->where('id',$user_id)->first();

        if ($this->request->getMethod() == 'post') {
            
            $datas['first_name'] = $this->request->getPost('first_name');
            $datas['last_name'] = $this->request->getPost('last_name');
            $datas['email'] = $this->request->getPost('email');

            $password = $this->request->getPost('password');
            $old_password = $this->request->getPost('old_password');

            if(!empty($password)){
                $datas['password'] = password_hash($password, PASSWORD_BCRYPT);
            }else{
                $datas['password']= $old_password;
            }
            $datas['mem_id_num'] = $this->getThrifterIdNum($datas['first_name'], $datas['last_name']);

            $chk_email = $user_model->where('email',$datas['email'])->first();

            if(empty($chk_email) || $chk_email['id']==$user_id){
                $user_model->update($user_id,$datas);

                $userGroupModel = new UserGroup();
                $ug['user_id'] = $user_id;
                $ug['group_id'] = $this->request->getPost('role');
                $userGroupModel->where('user_id',$user_id)->set($ug)->update();
                
                return redirect()->to(base_url('/admin/user/edit/'.$user_id))->with('success', 'User update successfully!');
            }else{
                return redirect()->to(base_url('/admin/user/edit/'.$user_id))->with('faild', 'Sorry Please choose a unique email!');
            }
            

            
        }
        return view('User/edit_user', $data);
    }
}
