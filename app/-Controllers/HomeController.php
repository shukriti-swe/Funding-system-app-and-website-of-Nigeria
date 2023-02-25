<?php

namespace App\Controllers;

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
        
        $role = 'users';
        
        $builder = $this->db->table('users u');
        $builder->select('u.id, u.first_name, u.last_name, u.email, u.phone, u.user_profile_image, u.active');

        $builder->join('thrift_two_win_member tm', 'u.id != tm.thrift_group_member_id'); 

        $builder->where('tm.thrift_group_id', $thriftId); 
        $builder->orderBy('u.first_name', 'asc');  

        $query = $builder->get();
        $results = $query->getResultArray();
        
        $sucess = $this->generateSuccess(lang('Home.list_thirft_invitees'), $results);
        return $this->getResponse($sucess);
    }

}
