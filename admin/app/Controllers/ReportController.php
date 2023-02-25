<?php

namespace App\Controllers;

use App\Models\UserModel; 

class ReportController extends BaseController {

    public function allJoinedThrifers(){
        return view('reports/joined_thrifers');
    }
  
  
      public function getAllJoinedThrifers(){
       
        $users = array();
  
        $requestData = $_REQUEST;
  
        $columns[0] = 'created_on';
        $columns[1] = 'name';
        $columns[2] = 'mem_id_num';
        $columns[3] = 'email';
        $columns[4] = 'employer_id';
        $columns[5] = 'concluded_thrifts';
        $columns[6] = 'status';
        $columns[7] = 'actions';
  
        $common_filter_value = false;
        $order_column = false;
  
        $specific_filters = array();
        $specific_filters = false;
  
        if (!empty($requestData['columns'][0]['search']['value'])) {
         
            $specific_filters['created_on'] = $requestData['columns'][0]['search']['value'];
        }
  
        if (!empty($requestData['columns'][1]['search']['value'])) {
            $specific_filters['name'] = $requestData['columns'][1]['search']['value'];
        }
  
        if (!empty($requestData['columns'][2]['search']['value'])) {
            $specific_filters['mem_id_num'] = $requestData['columns'][2]['search']['value'];
        }
  
        if (!empty($requestData['columns'][3]['search']['value'])) {
            $specific_filters['email'] = $requestData['columns'][3]['search']['value'];
        }
  
        if (!empty($requestData['columns'][4]['search']['value'])) {
            $specific_filters['employer_id'] = $requestData['columns'][4]['search']['value'];
        }
  
        if (!empty($requestData['columns'][5]['search']['value'])) {
            $specific_filters['concluded_thrifts'] = $requestData['columns'][5]['search']['value'];
        }
  
        if (!empty($requestData['columns'][5]['search']['value'])) {
          
            $specific_filters['status'] = $requestData['columns'][5]['search']['value'];
        }
        
  
        if (!empty($requestData['search']['value'])) {
            $common_filter_value = $requestData['search']['value'];
        }
        //print_r($specific_filters);die();
        if ($specific_filters == true || !empty($specific_filters)) {
            $common_filter_value = false;       //either search with specific filters or with common filter
        }
       
  
        $order['column'] = $columns[$requestData['order'][0]['column']];
        $order['by'] = $requestData['order'][0]['dir'];
  
  
        $limit['start'] = $requestData['start'];
        $limit['length'] = $requestData['length'];
  
       
        $builder = $this->db->table('thrift_two_win_member t2');
        $builder->select('t2.thrift_group_member_id,t2.thrift_group_member_join_date,CONCAT(t3.first_name, " ", t3.last_name) AS created_member_name,t3.mem_id_num,t3.email,DATE(t1.thrift_group_start_date) as thrift_group_start_date,DATE(t1.thrift_group_end_date) as thrift_group_end_date,t3.id');
        $builder->join('users t3', 't2.thrift_group_member_id = t3.id');
        $builder->join('thrift_two_win t1', 't2.thrift_group_id = t1.id');
        $builder->groupBy("t2.thrift_group_member_id");
        $builder = $builder->get();
        $thrifts = $builder->getResultArray();
        $totalData = count($thrifts);

        $builder = $this->db->table('thrift_two_win_member t2');
        $builder->select('t2.thrift_group_member_id,t2.thrift_group_member_join_date,CONCAT(t3.first_name, " ", t3.last_name) AS created_member_name,t3.mem_id_num,t3.email,DATE(t1.thrift_group_start_date) as thrift_group_start_date,DATE(t1.thrift_group_end_date) as thrift_group_end_date,t3.id');
        $builder->join('users t3', 't2.thrift_group_member_id = t3.id');
        $builder->join('thrift_two_win t1', 't2.thrift_group_id = t1.id');
        $builder->limit($limit['length'], $limit['start']);
        $builder->groupBy("t2.thrift_group_member_id");
        $builder = $builder->get();
        $thrifts = $builder->getResultArray();
  
        if ($common_filter_value == true || $specific_filters == true) {
  
          $builder = $this->db->table('thrift_two_win_member t2');
          $builder->select('t2.thrift_group_member_id,t2.thrift_group_member_join_date,CONCAT(t3.first_name, " ", t3.last_name) AS created_member_name,t3.mem_id_num,t3.email,DATE(t1.thrift_group_start_date) as thrift_group_start_date,DATE(t1.thrift_group_end_date) as thrift_group_end_date,t3.id');
          $builder->join('users t3', 't2.thrift_group_member_id = t3.id');
          $builder->join('thrift_two_win t1', 't2.thrift_group_id = t1.id');
          if ($specific_filters != false) {
            foreach ($specific_filters as $column_name => $filter_value) {
  
                if ($column_name == 'email' || $column_name == 'mem_id_num') {
                  $builder->like('t3.' . $column_name, $filter_value);
                }
  
                if ($column_name == 'status') {
                    if ($filter_value == 'running') {
                        $builder->where('DATE(t1.thrift_group_start_date) <=', date('Y-m-d'));
                        $builder->where('DATE(t1.thrift_group_end_date) >=', date('Y-m-d'));
                        $json_data['statuss'] = "Running";
                    } else if($filter_value == 'future') {
                      $builder->where('DATE(t1.thrift_group_start_date) >', date('Y-m-d'));
                      $json_data['statuss'] = "Future";
                    }else if($filter_value == 'complete'){
                      $builder->where('DATE(t1.thrift_group_end_date) <', date('Y-m-d'));
                      $json_data['statuss'] = "Complete";
                    }
                }
            }
          }
          if ($common_filter_value != false) {
            $builder->like(array('t2.thrift_group_id'=>$common_filter_value));
            $builder->orLike(array('t2.thrift_group_member_join_date'=>$common_filter_value));
            $builder->orLike(array('t3.email'=>$common_filter_value));
            $builder->orLike(array('t3.mem_id_num'=>$common_filter_value));
            $builder->orLike(array('t3.first_name'=>$common_filter_value));
            $builder->orLike(array('t3.last_name'=>$common_filter_value));
            //$builder->orLike(array('t3.user_gender'=>$common_filter_value));
          }
          $builder->groupBy("t2.thrift_group_member_id");
          $builder = $builder->get();
          $thrifts = $builder->getResultArray();
          $totalFiltered = count($thrifts);
        }
  
        if(!empty($totalFiltered)){
          $totalFiltered = $totalFiltered;
        }else{
          $totalFiltered = $totalData;
        }
        
        if ($thrifts == false || empty($thrifts) || $thrifts == null) {
            $thrifts = false;
        }

        if(!empty($thrifts)){

        foreach($thrifts as $key=>$thrift){
        $user_id= $thrift['thrift_group_member_id'];
        $join_date= $thrift['thrift_group_member_join_date'];

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
        $balance =  $deposits_amount - $withdraw_amount;
        $thrifts[$key]['balance'] = currency($balance);

        $time = date("m-d-Y",$join_date);
        $thrifts[$key]['thrift_group_member_join_date'] = $time;
        }
    }
        
        $json_data['draw'] = intval($requestData['draw']);
        $json_data['recordsTotal'] = intval($totalData); 
        $json_data['recordsFiltered'] = intval($totalData);
        $json_data['data'] = $thrifts;
  
        echo(json_encode($json_data));
      }
    public function allPaymentReport(){
        return view('reports/all_payment_report');
    }

    public function getAllPayments(){

        $payments = array();

        $date_range = false;
        $date_from = false;
        $date_to = false;


        $requestData = $_REQUEST;

        $columns[0] = 'thrift_group_number'; //tg
        $columns[1] = 'thrift_group_payer_employer_id'; //not sql table col
        $columns[2] = 'thrift_group_payment_amount'; //tp
        $columns[3] = 'thrift_group_payer_member_id'; //tp
        $columns[4] = 'thrift_group_payment_number'; //tp
        $columns[5] = 'thrift_group_payee_member_id';//tp
        $columns[6] = 'thrift_group_payment_date'; //tp
        $columns[7] = 'thrift_group_start_date'; // tg
        $columns[8] = 'thrift_group_end_date'; //tg
        $columns[9] = 'date_range'; //not sql table col


        $common_filter_value = false;
        $order_column = false;

        $specific_filters = array();
        $specific_filters = false;

        if (!empty($requestData['columns'][0]['search']['value'])) {
          
            $specific_filters['thrift_group_id'] = $requestData['columns'][0]['search']['value'];
        }

        if (!empty($requestData['columns'][1]['search']['value'])) {
            $specific_filters['thrift_group_payer_employer_id'] = $requestData['columns'][1]['search']['value'];
        }

        if (!empty($requestData['columns'][2]['search']['value'])) {
            $specific_filters['thrift_group_payment_amount'] = $requestData['columns'][2]['search']['value'];
        }

        if (!empty($requestData['columns'][3]['search']['value'])) {
            $specific_filters['thrift_group_payer_member_id'] = $requestData['columns'][3]['search']['value'];
        }

        if (!empty($requestData['columns'][4]['search']['value'])) {
            $specific_filters['paystack_id'] = $requestData['columns'][4]['search']['value'];
        }

        if (!empty($requestData['columns'][5]['search']['value'])) {
            $specific_filters['paystack_id'] = $requestData['columns'][5]['search']['value'];
        }

        if (!empty($requestData['columns'][6]['search']['value'])) {
            $specific_filters['thrift_group_payment_date'] = $requestData['columns'][6]['search']['value'];
        }

        if (!empty($requestData['columns'][7]['search']['value'])) {
            $specific_filters['thrift_group_start_date'] = $requestData['columns'][7]['search']['value'];
        }

        if (!empty($requestData['columns'][8]['search']['value'])) {
            $specific_filters['date_range'] = $requestData['columns'][8]['search']['value'];
           

        }
        


        if (!empty($requestData['search']['value'])) {
            
            $common_filter_value = $requestData['search']['value'];
            // echo $common_filter_value;die();
        }
        

        if ($specific_filters == true || !empty($specific_filters)) {
            $common_filter_value = false;  
        }
        $order['column'] = $columns[$requestData['order'][0]['column']];
        $order['by'] = $requestData['order'][0]['dir'];

        $limit['start'] = $requestData['start'];
        $limit['length'] = $requestData['length'];

        $builder = $this->db->table('thrift_two_win_payment_log t1');
        $builder->select('t1.thrift_group_id,t1.deposits_amount,t1.paystack_id,t1.payment_info,t1.deposits_date,CONCAT(t2.first_name, " ", t2.last_name) AS member_name,DATE(t3.thrift_group_start_date) as thrift_group_start_date,DATE(t3.thrift_group_end_date) as thrift_group_end_date');
        $builder->join('users t2', 't1.user_id = t2.id');
        $builder->join('thrift_two_win t3', 't1.thrift_group_id = t3.id');
        $builder = $builder->get();
        $payments = $builder->getResultArray();
        $totalData = count($payments);

        $builder = $this->db->table('thrift_two_win_payment_log t1');
        $builder->select('t1.thrift_group_id,t1.deposits_amount,t1.paystack_id,t1.payment_info,t1.deposits_date,CONCAT(t2.first_name, " ", t2.last_name) AS member_name,DATE(t3.thrift_group_start_date) as thrift_group_start_date,DATE(t3.thrift_group_end_date) as thrift_group_end_date,t2.id as user_id');
        $builder->join('users t2', 't1.user_id = t2.id');
        $builder->join('thrift_two_win t3', 't1.thrift_group_id = t3.id');
        $builder->limit($limit['length'], $limit['start']);
        $builder = $builder->get();
        $payments = $builder->getResultArray();

        if ($common_filter_value == true || $specific_filters == true) {

        $builder = $this->db->table('thrift_two_win_payment_log t1');
        $builder->select('t1.thrift_group_id,t1.deposits_amount,t1.paystack_id,t1.payment_info,t1.deposits_date,CONCAT(t2.first_name, " ", t2.last_name) AS member_name,DATE(t3.thrift_group_start_date) as thrift_group_start_date,DATE(t3.thrift_group_end_date) as thrift_group_end_date,t2.id as user_id');
        $builder->join('users t2', 't1.user_id = t2.id');
        $builder->join('thrift_two_win t3', 't1.thrift_group_id = t3.id');
        if ($specific_filters != false) {
            foreach ($specific_filters as $column_name => $filter_value) {

                if ($column_name == 'date_range') {
                    $dates = explode('to', $filter_value);
                    $start_date = $dates[0];
                    $end_date = $dates[1];
                    if($start_date==$end_date){
                        $builder->where('DATE(t1.deposits_date)  =', $start_date);
                        }else{

                    $builder->where('t1.deposits_date >=', $start_date);
                    $builder->where('t1.deposits_date <=', $end_date);
                        }
                }
  
                if ($column_name == 'thrift_group_id') {
                  $builder->like('t1.thrift_group_id', $filter_value);
                }
                if ($column_name == 'paystack_id') {
                    $builder->like('t1.paystack_id', $filter_value);
                }
  
                if ($column_name == 'status') {
                    if ($filter_value == 'running') {
                        $builder->where('DATE(t1.thrift_group_start_date) <=', date('Y-m-d'));
                        $builder->where('DATE(t1.thrift_group_end_date) >=', date('Y-m-d'));
                        $json_data['statuss'] = "Running";
                    } else if($filter_value == 'future'){
                      $builder->where('DATE(t1.thrift_group_start_date) >', date('Y-m-d'));
                      $json_data['statuss'] = "Future";
                    }else if($filter_value == 'complete'){
                      $builder->where('DATE(t1.thrift_group_end_date) <', date('Y-m-d'));
                      $json_data['statuss'] = "Complete";
                    }
                }
            }
          }
        if ($common_filter_value != false) {
            $builder->like(array('t1.thrift_group_id'=>$common_filter_value));
            $builder->orLike(array('t1.deposits_amount'=>$common_filter_value));
            $builder->orLike(array('t1.paystack_id'=>$common_filter_value));
            $builder->orLike(array('t1.payment_info'=>$common_filter_value));
            $builder->orLike(array('t1.deposits_date'=>$common_filter_value));
            $builder->orLike(array('t2.first_name'=>$common_filter_value));
            $builder->orLike(array('t2.last_name'=>$common_filter_value));
            $builder->orLike(array('t3.thrift_group_start_date'=>$common_filter_value));
            $builder->orLike(array('t3.thrift_group_end_date'=>$common_filter_value));
            //$builder->orLike(array('t3.user_gender'=>$common_filter_value));
        }
        $builder = $builder->get();
        $payments = $builder->getResultArray();
        // echo $this->db->getLastQuery();die();
        $totalFiltered = count($payments);
        }

        if(!empty($totalFiltered)){
            $totalFiltered = $totalFiltered;
          }else{
            $totalFiltered = $totalData;
          }
          
        

        if ($payments == false || empty($payments) || $payments == null) {
            $payments = false;
        }

        

        if(!empty($payments)){

     
        foreach($payments as $key => $val){
            $payments[$key]['deposits_amount']= currency($payments[$key]['deposits_amount']);
            $ddate=date_create($val['deposits_date']);
            $payments[$key]['deposits_date']= date_format($ddate,"d-m-Y");

            $sdate=date_create($val['thrift_group_start_date']);
            $payments[$key]['thrift_group_start_date']= date_format($sdate,"d-m-Y");

            $edate=date_create($val['thrift_group_end_date']);
            $payments[$key]['thrift_group_end_date']= date_format($edate,"d-m-Y");
            
        }
        }

        $json_data['draw'] = intval($requestData['draw']);
        $json_data['recordsTotal'] = intval($totalData);
        $json_data['recordsFiltered'] = intval($totalData);
        $json_data['data'] = $payments;

        echo(json_encode($json_data));
    }

    public function thriftInfo($user_id){

      $builder = $this->db->table('users t1');
      $builder->select('t1.*');

      $builder->where('t1.id',$user_id);
      $builder = $builder->get();
      $thrift= $builder->getResultArray();

      $data['thrift'] = $thrift[0];

      return view('reports/thrift_info',$data);
    }
    public function getThriftListInfo($user_id){

        $draw=$this->request->getVar('draw');
        $offset=$this->request->getVar('start');
        $limit=$this->request->getVar('length');
        
        if($draw){
            $data['draw']= $draw;
          }
          else{
            $data['draw']= 1;
          }
 
          $builder = $this->db->table('thrift_two_win_member t1');
          $builder->select('t1.*,t2.*');
          $builder->join('thrift_two_win t2', 't1.thrift_group_id = t2.id');
          $builder->where('t1.thrift_group_member_id',$user_id);
          $builder = $builder->get();
          $thrifts= $builder->getResultArray();
          $total=count($thrifts);
        
          
          $data['recordsTotal']= $total;
          $data['recordsFiltered']= $total;
 

           //for search-------- 
           $search=$this->request->getVar('search[value]');
        
           if($search){
            $builder = $this->db->table('thrift_two_win_member t1');
            $builder->select('t1.*,t2.*');
            $builder->like(array('t1.thrift_group_id'=>$search));
            $builder->orLike(array('t2.thrift_name'=>$search));
            $builder->join('thrift_two_win t2', 't1.thrift_group_id = t2.id');
             $builder->limit($limit,$offset);
             $builder->where('t1.thrift_group_member_id',$user_id);
             $query=$builder->get();
             $thrifts=$query->getResult();
             $recordsFiltered=count($thrifts);
             $data['recordsTotal']= $total;
             $data['recordsFiltered']= $total;
             } 

           $data['data']=$thrifts; 
 
        echo json_encode($data); 
    }

    public function allUserBvnReport(){
        return view('reports/User_bvn_report');
    }

    public function getAllUserBvn(){

        $user_bvn = array();

        $date_range = false;
        $date_from = false;
        $date_to = false;


        $requestData = $_REQUEST;

        $columns[0] = 'bank_code'; //tg
        $columns[1] = 'account_number'; //not sql table col
        $columns[2] = 'beneficiary'; //tp
        $columns[3] = 'ststus'; //tp
        $columns[4] = 'email'; //tp
        $columns[5] = 'user_name';//tp


        $common_filter_value = false;
        $order_column = false;

        $specific_filters = array();
        $specific_filters = false;


        if (!empty($requestData['columns'][4]['search']['value'])) {
            $specific_filters['email'] = $requestData['columns'][4]['search']['value'];
         
        }

        if (!empty($requestData['columns'][5]['search']['value'])) {
            $specific_filters['status'] = $requestData['columns'][5]['search']['value'];
          
        }
        

        if (!empty($requestData['search']['value'])) {
            
            $common_filter_value = $requestData['search']['value'];
          
        }
        

        if ($specific_filters == true || !empty($specific_filters)) {
            $common_filter_value = false;  
        }
        $order['column'] = $columns[$requestData['order'][0]['column']];
        $order['by'] = $requestData['order'][0]['dir'];
        

        $limit['start'] = $requestData['start'];
        $limit['length'] = $requestData['length'];
         

        $builder = $this->db->table('thrift_two_win_user_bvn t1');
        $builder->select('CONCAT(t2.first_name, " ", t2.last_name) AS user_name,t1.bank_code,t1.account_number,t1.beneficiary,t2.email,t1.status');
        $builder->join('users t2', 't1.user_id = t2.id');
        $builder = $builder->get();
        $user_bvn = $builder->getResultArray();
        $totalData = count($user_bvn);

        $builder = $this->db->table('thrift_two_win_user_bvn t1');
        $builder->select('CONCAT(t2.first_name, " ", t2.last_name) AS user_name,t1.bank_code,t1.account_number,t1.beneficiary,t2.email,t1.status,t1.id,t2.id as user_id');
        $builder->join('users t2', 't1.user_id = t2.id');
        $builder->limit($limit['length'], $limit['start']);
        $builder = $builder->get();
        $user_bvn = $builder->getResultArray();
       

        if ($common_filter_value == true || $specific_filters == true) {

            $builder = $this->db->table('thrift_two_win_user_bvn t1');
            $builder->select('CONCAT(t2.first_name, " ", t2.last_name) AS user_name,t1.bank_code,t1.account_number,t1.beneficiary,t2.email,t1.status,t1.id,t2.id as user_id');
            $builder->join('users t2', 't1.user_id = t2.id');

        if ($specific_filters != false) {
            foreach ($specific_filters as $column_name => $filter_value) {

                if ($column_name == 'email') {
                  $builder->like('t2.email', $filter_value);
                }
                if ($column_name == 'status') {
                    $builder->like('t1.status', $filter_value);
                }
            }
          }
        if ($common_filter_value != false) {
            
            $builder->like(array('t1.bank_code'=>$common_filter_value));
            $builder->orLike(array('t1.account_number'=>$common_filter_value));
            $builder->orLike(array('t1.beneficiary'=>$common_filter_value));
            $builder->orLike(array('t1.status'=>$common_filter_value));
            $builder->orLike(array('t2.first_name'=>$common_filter_value));
            $builder->orLike(array('t2.last_name'=>$common_filter_value));
            $builder->orLike(array('t2.email'=>$common_filter_value));
            
        }
        
        $builder = $builder->get();
        $user_bvn = $builder->getResultArray();

        $totalFiltered = count($user_bvn);
        }

        if(!empty($totalFiltered)){
            $totalFiltered = $totalFiltered;
          }else{
            $totalFiltered = $totalData;
          }
          
        

        if ($user_bvn == false || empty($user_bvn) || $user_bvn == null) {
            $user_bvn = false;
        }

        //echo "<pre>";print_r($user_bvn);die();

        $json_data['draw'] = intval($requestData['draw']);
        $json_data['recordsTotal'] = intval($totalData);
        $json_data['recordsFiltered'] = intval($totalData);
        $json_data['data'] = $user_bvn;

        echo(json_encode($json_data));
    }

    public function referralids(){

        return view('reports/referral_ids');
    }

    public function getAllReferralIds(){

        $referrals = array();

        $date_range = false;
        $date_from = false;
        $date_to = false;


        $requestData = $_REQUEST;



        $common_filter_value = false;
        $order_column = false;

        $specific_filters = array();
        $specific_filters = false;


        if (!empty($requestData['columns'][4]['search']['value'])) {
            $specific_filters['email'] = $requestData['columns'][4]['search']['value'];
  
        }

        if (!empty($requestData['columns'][6]['search']['value'])) {
            $specific_filters['date_range'] = $requestData['columns'][6]['search']['value'];
 
        }
        

        if (!empty($requestData['search']['value'])) {
            
            $common_filter_value = $requestData['search']['value'];
         
        }
        

        if ($specific_filters == true || !empty($specific_filters)) {
            $common_filter_value = false;  
        }
        //$order['column'] = $columns[$requestData['order'][0]['column']];
        $order['by'] = $requestData['order'][0]['dir'];
        

        $limit['start'] = $requestData['start'];
        $limit['length'] = $requestData['length'];
         

        $builder = $this->db->table('thrift_two_win_referral_amount t1');
        $builder->select('CONCAT(t2.first_name, " ", t2.last_name) AS user_name,t2.email,t1.referral_amount,t1.purpose,t1.created_at,t4.thrift_name');
        $builder->join('users t2', 't1.user_id = t2.id');
        $builder->join('thrift_two_win_member t3', 't1.user_id = t3.thrift_group_member_id');
        $builder->join('thrift_two_win t4', 't3.thrift_group_id = t4.id');
        $builder = $builder->get();
        $referrals = $builder->getResultArray();
        $totalData = count($referrals);
       

        if ($common_filter_value == true || $specific_filters == true) {

            $builder = $this->db->table('thrift_two_win_referral_amount t1');
            $builder->select('CONCAT(t2.first_name, " ", t2.last_name) AS user_name,t2.email,t1.referral_amount,t1.purpose,t1.created_at,t4.thrift_name');
            $builder->join('users t2', 't1.user_id = t2.id');
            $builder->join('thrift_two_win_member t3', 't1.user_id = t3.thrift_group_member_id');
            $builder->join('thrift_two_win t4', 't3.thrift_group_id = t4.id');

        if ($specific_filters != false) {
            foreach ($specific_filters as $column_name => $filter_value) {

                if ($column_name == 'email') {
                  $builder->like('t2.email', $filter_value);
                }
                if ($column_name == 'date_range') {
                    $dates = explode('to', $filter_value);
                    $start_date = $dates[0];
                    $end_date = $dates[1];
                    
                    if($start_date==$end_date){
                    $builder->where('DATE(t1.created_at)  =', $start_date);
                    }else{

                        $builder->where('t1.created_at >=', $start_date);
                        $builder->orWhere('t1.created_at <=', $end_date);
                    }
                }
            }
          }
        if ($common_filter_value != false) {
            
            $builder->orLike(array('t2.first_name'=>$common_filter_value));
            $builder->orLike(array('t2.last_name'=>$common_filter_value));
            $builder->orLike(array('t2.email'=>$common_filter_value));
            $builder->orLike(array('t1.referral_amount'=>$common_filter_value));
            $builder->orLike(array('t1.purpose'=>$common_filter_value));
            $builder->orLike(array('t1.created_at'=>$common_filter_value));
            $builder->orLike(array('t4.thrift_name'=>$common_filter_value));
            
        }
        
        $builder = $builder->get();
        //echo $this->db->getLastQuery();die();
        $referrals = $builder->getResultArray();

        $totalFiltered = count($referrals);
        }

        if(!empty($totalFiltered)){
            $totalFiltered = $totalFiltered;
          }else{
            $totalFiltered = $totalData;
          }
          
        

        if ($referrals == false || empty($referrals) || $referrals == null) {
            $referrals = false;
        }

        //echo "<pre>";print_r($referrals);die();

        if(!empty($referrals)){
            foreach($referrals as $key=>$referral){
                $referrals[$key]['referral_amount']= currency($referral['referral_amount']); 
                $date=date_create($referral['created_at']);
                $referrals[$key]['created_at']= date_format($date,"d-m-Y");
            }
        }


        $json_data['draw'] = intval($requestData['draw']);
        $json_data['recordsTotal'] = intval($totalData);
        $json_data['recordsFiltered'] = intval($totalData);
        $json_data['data'] = $referrals;

        echo(json_encode($json_data));
    }

    public function getBvnStatusReport(){
        $id = $this->request->getVar('id');
  
        $builder = $this->db->table('thrift_two_win_user_bvn');
        $builder->select('*');
        $builder->where('id', $id);
        $builder = $builder->get();
        $user_bvn = $builder->getResultArray();
        $report = json_decode($user_bvn[0]['report'],true);

        echo json_encode($report);
    }
}
