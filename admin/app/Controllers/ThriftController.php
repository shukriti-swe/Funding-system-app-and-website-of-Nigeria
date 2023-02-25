<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\GroupmemberModel;
use App\Models\UserdetailsModel;
use App\Models\Thrifttwowin;
use App\Models\Thrifttwowinmember;
use App\Models\Thrifttwowinreferralamount;
use App\Models\EmailTemplate;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;

use Exception;
use ReflectionException;
use CodeIgniter\Events\Events;
use DateTime;
use App\Models\Thrifttowinwithdraw;
use CodeIgniter\HTTP\IncomingRequest;
use Mpdf\Mpdf;



class ThriftController extends BaseController
{
  public function thriftList()
  {
    return view('thrift/thriftlist');
  }

  public function paymentIssue()
  {
    return view('thrift/payment_issue');
  }
  
  public function paymentStatus()
  {
    $info = $this->request->getVar();
    $withdrawModel = new Thrifttowinwithdraw();
    $results = $withdrawModel->where('id', $info['Id'])->first();

    echo json_encode($results);
  }

  public function getWithdrawsData()
  {

    $withdraws = array();
    $requestData = $_REQUEST;


    $common_filter_value = false;
    $order_column = false;

    $specific_filters = array();
    $specific_filters = false;


    if (!empty($requestData['columns'][9]['search']['value'])) {
      $specific_filters['date_range'] = $requestData['columns'][9]['search']['value'];
    }
    if (!empty($requestData['columns'][8]['search']['value'])) {
      $specific_filters['email'] = $requestData['columns'][8]['search']['value'];
    }


    if (!empty($requestData['search']['value'])) {

      $common_filter_value = $requestData['search']['value'];
    }

    $limit['start'] = $requestData['start'];
    $limit['length'] = $requestData['length'];


    $builder = $this->db->table('thrift_two_win_withdraw wi');
    $builder->select('wi.id,wi.withdraw_amount,wi.account_number,wi.bank_code,wi.bank_name,CONCAT(users.first_name, " ", users.last_name) AS member_name,wi.withdraw_date,wi.beneficiary,users.email,wi.status');
    $builder->join('users', 'wi.user_id = users.id', 'left');

    $query = $builder->get();
    $withdraws = $query->getResult();
    $totalData = count($withdraws);

    if ($common_filter_value == true || $specific_filters == true) {

      $builder = $this->db->table('thrift_two_win_withdraw wi');
      $builder->select('wi.id,wi.withdraw_amount,wi.account_number,wi.bank_code,wi.bank_name,CONCAT(users.first_name, " ", users.last_name) AS member_name,wi.withdraw_date,wi.beneficiary,users.email,wi.status');
      $builder->join('users', 'wi.user_id = users.id', 'left');

      if ($specific_filters != false) {
        foreach ($specific_filters as $column_name => $filter_value) {

          if ($column_name == 'date_range') {

            $dates = explode('to', $filter_value);
          
            $start_date = $dates[0];
            $end_date = $dates[1];
            $builder->where('wi.withdraw_date >=', $start_date);
            $builder->where('wi.withdraw_date <=', $end_date);
          }
          if ($column_name == 'email') {
            $builder->like(array('users.email' => $filter_value));
          }
        }
      }

      if ($common_filter_value != false) {
        $builder->like(array('wi.withdraw_amount' => $common_filter_value));
        $builder->like(array('wi.account_number' => $common_filter_value));
        $builder->orLike(array('wi.bank_code' => $common_filter_value));
        $builder->orLike(array('wi.bank_name' => $common_filter_value));
        $builder->orLike(array('users.first_name' => $common_filter_value));
        $builder->orLike(array('users.last_name' => $common_filter_value));
        $builder->orLike(array('wi.withdraw_date' => $common_filter_value));
        $builder->orLike(array('wi.beneficiary' => $common_filter_value));
        $builder->orLike(array('users.email' => $common_filter_value));
      }

      $builder = $builder->get();
      $withdraws = $builder->getResult();
      
      $totalFiltered = count($withdraws);
    }

    if (!empty($totalFiltered)) {
      $totalFiltered = $totalFiltered;
    } else {
      $totalFiltered = $totalData;
    }
   
    if ($withdraws == false || empty($withdraws) || $withdraws == null) {
      $withdraws = false;
    }
   if(!empty($withdraws)){
    
    foreach ($withdraws as $key => $val) {
      $withdraws[$key]->withdraw_amount = currency($val->withdraw_amount);
      $sdate = date_create($val->withdraw_date);
      $withdraws[$key]->withdraw_date = date_format($sdate, "d-m-Y");
    }
    
   }


    $json_data['draw'] = intval($requestData['draw']);
    $json_data['recordsTotal'] = intval($totalData);
    $json_data['recordsFiltered'] = intval($totalFiltered);
    $json_data['data'] = $withdraws;

    echo (json_encode($json_data));
  }


  public function getAllThrifts()
  {

    $thrifts = array();
    $requestData = $_REQUEST;


    $common_filter_value = false;
    $order_column = false;

    $specific_filters = array();
    $specific_filters = false;

    if (!empty($requestData['columns'][0]['search']['value'])) {
      $specific_filters['id'] = $requestData['columns'][0]['search']['value'];
    }

    if (!empty($requestData['columns'][1]['search']['value'])) {
      $specific_filters['thrift_group_product_id'] = $requestData['columns'][1]['search']['value'];
    }

    if (!empty($requestData['columns'][2]['search']['value'])) {
      $specific_filters['thrift_group_product_price'] = $requestData['columns'][2]['search']['value'];
    }

    if (!empty($requestData['columns'][3]['search']['value'])) {
      $specific_filters['thrift_group_completion'] = $requestData['columns'][3]['search']['value'];
    }

    if (!empty($requestData['columns'][4]['search']['value'])) {
      $specific_filters['status'] = $requestData['columns'][4]['search']['value'];
    }

    if (!empty($requestData['columns'][5]['search']['value'])) {
      $specific_filters['thrift_group_activation_status'] = $requestData['columns'][5]['search']['value'];
    }

    if (!empty($requestData['columns'][6]['search']['value'])) {
      $specific_filters['thrift_group_open'] = $requestData['columns'][6]['search']['value'];
    }


    if (!empty($requestData['search']['value'])) {

      $common_filter_value = $requestData['search']['value'];
    }


    $limit['start'] = $requestData['start'];
    $limit['length'] = $requestData['length'];


    $builder = $this->db->table('thrift_two_win t2');
    $builder->select('t2.id,t2.thrift_group_number,t2.thrift_name,t2.thrift_group_term_duration,t2.thrift_group_product_price');
    $builder->join('users t3', 't2.created_member = t3.id');
    $builder = $builder->get();
    $thrifts = $builder->getResultArray();

    $totalData = count($thrifts);

    if ($common_filter_value == true || $specific_filters == true) {

      $builder = $this->db->table('thrift_two_win t2');
      $builder->select('t2.id,t2.thrift_group_number,t2.thrift_name,t2.thrift_group_term_duration,t2.thrift_group_product_price');
      $builder->join('users t3', 't2.created_member = t3.id');

      if ($specific_filters != false) {
        foreach ($specific_filters as $column_name => $filter_value) {

          if ($column_name == 'id') {
            $builder->where('t2.id', $filter_value);
          }
          if ($column_name == 'status') {
            if ($filter_value == 'running') {
              $builder->where('DATE(t2.thrift_group_start_date) <=', date('Y-m-d'));
              $builder->where('DATE(t2.thrift_group_end_date) >=', date('Y-m-d'));
              $json_data['statuss'] = "Running";
            } else if ($filter_value == 'future') {
              $builder->where('DATE(t2.thrift_group_start_date) >', date('Y-m-d'));
              $json_data['statuss'] = "Future";
            } else if ($filter_value == 'complete') {
              $builder->where('DATE(t2.thrift_group_end_date) <', date('Y-m-d'));
              $json_data['statuss'] = "Complete";
            }
          }
        }
      }

      if ($common_filter_value != false) {
        $builder->like(array('t2.id' => $common_filter_value));
        $builder->orLike(array('t2.thrift_name' => $common_filter_value));
        $builder->orLike(array('t2.thrift_group_term_duration' => $common_filter_value));
        $builder->orLike(array('t2.thrift_group_product_price' => $common_filter_value));
      }

      $builder = $builder->get();
      $thrifts = $builder->getResultArray();
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



    if ($thrifts == false || empty($thrifts) || $thrifts == null) {
      $thrifts = false;
    }
   if(!empty($thrifts)){
    foreach ($thrifts as $key => $thrift) {
      $thrifts[$key]['thrift_group_product_price'] = currency($thrift['thrift_group_product_price']);
    }
  }


    $json_data['draw'] = intval($requestData['draw']);
    $json_data['recordsTotal'] = intval($totalData);
    $json_data['recordsFiltered'] = intval($totalData);
    $json_data['data'] = $thrifts;

    echo (json_encode($json_data));
  }

  public function thriftDetails($id)
  {

    $this->thriftCompleteCheck();

    $nbuilder = $this->db->table('thrift_two_win tw');
    $nbuilder->join('users u', 'tw.created_member = u.id');
    $nbuilder->select('tw.*, u.first_name, u.last_name, u.email, u.user_profile_image, u.user_gender');
    $nbuilder->where('tw.id', $id);
    $query = $nbuilder->get();
    $thrift_group = $query->getrow();

    if ($thrift_group) {

      $thrift_group->interest_rate = 5;


      if ($thrift_group->thrift_group_open == 1) {
        $start_date =  new DateTime($thrift_group->thrift_group_start_date);
        $start_date_timestamp = $start_date->getTimestamp();
        if (time() > $start_date_timestamp) {
          $end_date =  new DateTime($thrift_group->thrift_group_end_date);
          $end_date_timestamp = $end_date->getTimestamp();
          $thrift_group->status = 'Ongoing';
          $thrift_group->expire_remaining_time = $end_date_timestamp - time();
        } else {
          $thrift_group->status = 'Pending';
          $thrift_group->start_remaining_time = $start_date_timestamp - time();
        }
      } else {
        $thrift_group->status = 'Completed';

      }

      $tbuilder = $this->db->table('thrift_two_win_member');
      $tbuilder->select('users.id,users.first_name,users.last_name,users.phone, users.user_profile_image, users.user_gender');
      $tbuilder->join('users', 'thrift_two_win_member.thrift_group_member_id = users.id');
      $tbuilder->where('thrift_two_win_member.thrift_group_id', $id);
      $query = $tbuilder->get();
      $allMember = $query->getResultArray();
      $thrift_group->members = $allMember;

      $thrift_group->potential_winnings = 'Need more members ...';

      if ($allMember) {
        $total_thrift_members = count($allMember);
        $amount_total = $total_thrift_members *  $thrift_group->thrift_group_product_price * ($thrift_group->interest_rate / 100) * ($thrift_group->thrift_group_term_duration / 12);
        $thrift_group->potential_winnings = round($amount_total, 2);

      }
      $data['potential_winnings'] = $thrift_group->potential_winnings;
    }

    $builder = $this->db->table('thrift_two_win t2');
    $builder->select('t2.id,t2.thrift_group_number,t2.thrift_description,t2.thrift_name,t2.thrift_group_term_duration,t2.thrift_group_product_price,t2.thrift_group_start_date,t2.thrift_group_end_date, CONCAT(t3.first_name, " ", t3.last_name) AS created_member_name');
    $builder->join('users t3', 't2.created_member = t3.id');
    $builder->where('t2.id', $id);
    $builder = $builder->get();
    $Thrift = $builder->getResultArray();


    $builder = $this->db->table('thrift_two_win_winner t1');
    $builder->select('CONCAT(t2.first_name, " ", t2.last_name) AS user_name,t3.thrift_name');
    $builder->join('users t2', 't1.user_id = t2.id');
    $builder->join('thrift_two_win t3', 't3.id = t1.thrift_group_id');
    $builder->where('t1.thrift_group_id', $id);
    $builder = $builder->get();
    $data['Thrift_winner'] = $builder->getResultArray();
 


    $data['thrift'] = $Thrift[0];
    $data['thrift_group_id'] = $id;

    return view('thrift/thrift_details', $data);
  }

  public function getThriptMember($id)
  {

    $draw = $this->request->getVar('draw');
    $offset = $this->request->getVar('start');
    $limit = $this->request->getVar('length');

    if ($draw) {
      $data['draw'] = $draw;
    } else {
      $data['draw'] = 1;
    }

    $builder = $this->db->table('thrift_two_win_member t1');
    $builder->select('t1.thrift_group_member_join_date,t3.mem_id_num,t3.email,t3.phone,t3.user_gender, CONCAT(t3.first_name, " ", t3.last_name) AS created_member_name');
    $builder->join('thrift_two_win t2', 't1.thrift_group_id = t2.id');
    $builder->join('users t3', 't1.thrift_group_member_id = t3.id');
    $builder->where('t1.thrift_group_id', $id);
    $query = $builder->get();
    $results = $query->getResultArray();
    $total = count($results);
    $data['recordsTotal'] = $total;
    $data['recordsFiltered'] = $total;

    $builder = $this->db->table('thrift_two_win_member t1');
    $builder->select('t1.thrift_group_member_join_date,t3.mem_id_num,t3.email,t3.phone,t3.user_gender, CONCAT(t3.first_name, " ", t3.last_name) AS created_member_name');
    $builder->join('thrift_two_win t2', 't1.thrift_group_id = t2.id');
    $builder->join('users t3', 't1.thrift_group_member_id = t3.id');
    $builder->where('t1.thrift_group_id', $id);
    $builder->limit($limit, $offset);
    $query = $builder->get();
    $members = $query->getResultArray();

    //for search-------- 
    $search = $this->request->getVar('search[value]');

    if ($search) {

      $builder = $this->db->table('thrift_two_win_member t1');
      $builder->select('t1.thrift_group_member_join_date,t3.mem_id_num,t3.email,t3.phone,t3.user_gender, CONCAT(t3.first_name, " ", t3.last_name) AS created_member_name');
      $builder->like(array('t1.thrift_group_member_join_date' => $search));
      $builder->orLike(array('t3.mem_id_num' => $search));
      $builder->orLike(array('t3.email' => $search));
      $builder->orLike(array('t3.phone' => $search));
      $builder->orLike(array('t3.first_name' => $search));
      $builder->orLike(array('t3.last_name' => $search));
      $builder->orLike(array('t3.user_gender' => $search));

      $builder->join('thrift_two_win t2', 't1.thrift_group_id = t2.id');
      $builder->join('users t3', 't1.thrift_group_member_id = t3.id');
      $builder->where('t1.thrift_group_id', $id);
      $builder->limit($limit, $offset);
      $query = $builder->get();
      $members = $query->getResultArray();
    }
    foreach ($members as $key => $member) {
      //$jdate= date_create($member['thrift_group_member_join_date']);
      $members[$key]['thrift_group_member_join_date'] = date('d-m-Y', $member['thrift_group_member_join_date']);

    }

    $data['data'] = $members;
    echo json_encode($data);
  }

  private function thriftCompleteCheck()
  {
    $spc = new \Thrift();
    $spc->thriftend();
  }
  public function invatationUsers($id)
  {
    // echo "hello rafi"; die();

    $draw = $this->request->getVar('draw');
    $offset = $this->request->getVar('start');
    $limit = $this->request->getVar('length');

    if ($draw) {
      $data['draw'] = $draw;
    } else {
      $data['draw'] = 1;
    }

    $builder = $this->db->table('thrift_two_win_invited_member t1');
    $builder->select('t1.invited_email,t1.invited_date,t1.is_join');
    $builder->where('t1.thrift_id', $id);
    $query = $builder->get();
    $results = $query->getResultArray();
    $total = count($results);

    $data['recordsTotal'] = $total;
    $data['recordsFiltered'] = $total;

    $builder = $this->db->table('thrift_two_win_invited_member t1');
    $builder->select('t1.invited_email,t1.invited_date,t1.is_join');
    $builder->where('t1.thrift_id', $id);
    $builder->limit($limit, $offset);
    $query = $builder->get();
    $members = $query->getResultArray();

    //for search-------- 
    $search = $this->request->getVar('search[value]');

    if ($search) {
      $builder = $this->db->table('thrift_two_win_invited_member t1');
      $builder->select('t1.invited_email,t1.invited_date,t1.is_join');
      $builder->like(array('t1.invited_email' => $search));
      $builder->orLike(array('t3.invited_date' => $search));
      $builder->orLike(array('t3.is_join' => $search));

      $builder->where('t1.thrift_id', $id);
      $builder->limit($limit, $offset);
      $query = $builder->get();
      $members = $query->getResultArray();
    }
    foreach($members as $key=>$val){
         $idate = date_create($val['invited_date']);
         $members[$key]['invited_date']= date_format($idate,"d-m-Y");
    }


    $data['data'] = $members;
    echo json_encode($data);
  }
  public function withdrawstatus($id,$status)
  {
    $data['withdraw_id']=$id;
    $data['status']=$status;
 
    return view('thrift/withdrawstatus',$data);
  }

  public function updateWithdrawStatus()
  {
    $withdraw_model = new Thrifttowinwithdraw();
    $withdraw_id=$this->request->getVar('withdraw_id');
    $data['status']=$this->request->getVar('status');
    $data['status_details']=$this->request->getVar('status_details');
    $update = $withdraw_model->update($withdraw_id,$data);
    $data['withdraw_id']=$withdraw_id;
    if($update){
      $data['success']= 'Updated Successfully';
    }
    return view('thrift/withdrawstatus',$data);
  }


}
