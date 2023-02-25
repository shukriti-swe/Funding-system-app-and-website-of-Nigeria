<?php

namespace App\Controllers;
use App\Models\Faqmodel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ReflectionException;

class FaqController extends BaseController {

    public function add_faq() {
        if ($this->request->getMethod() == 'post') {

            if ($this->validate('addfaq')) {
                $data=[
                   'question' => $this->request->getVar('question'),
                   'answer' => $this->request->getVar('answer'),
                ];
                $faq_model = new Faqmodel();

                $insert = $faq_model->save($data);

                if($insert){
                    return redirect()->to(base_url('addfaq'))->with('success', 'Faq insert successfully!');
                }
            }else {
                $data['validation'] = $this->validator;
                return view('faq/add_faq', $data);
            }
         }
        return view('faq/add_faq');
    }

    public function faq_list(){

        return view('faq/faq_list');
    }

    public function getFaqByAjax(){

        $faqs = array();
        $requestData = $_REQUEST;
    
    
        $common_filter_value = false;
        $order_column = false;
    
        $specific_filters = array();
        $specific_filters = false;
     
        //print_r();die();
        // if (!empty($requestData['columns'][9]['search']['value'])) {
        //   $specific_filters['date_range'] = $requestData['columns'][9]['search']['value'];
        // }
        // if (!empty($requestData['columns'][8]['search']['value'])) {
        //   $specific_filters['email'] = $requestData['columns'][8]['search']['value'];
        // }
    
    
        if (!empty($requestData['search']['value'])) {
    
          $common_filter_value = $requestData['search']['value'];
        }
    
        $limit['start'] = $requestData['start'];
        $limit['length'] = $requestData['length'];
    
        //print_r($limit);die();
        $builder = $this->db->table('thrift_two_win_faq');
        $builder->select('*');
        $query = $builder->get();
        $faqs = $query->getResult();
        $totalData = count($faqs);
    
        $builder = $this->db->table('thrift_two_win_faq');
        $builder->select('question,answer,in_order,created_at,id as faq_id');
        $builder->limit($limit['length'],$limit['start']);
        $builder = $builder->get();
        $faqs = $builder->getResultArray();
    
        
    
        if ($common_filter_value == true || $specific_filters == true) {
    
            $builder = $this->db->table('thrift_two_win_faq');
            $builder->select('*');
    
          if ($specific_filters != false) {
            // foreach ($specific_filters as $column_name => $filter_value) {
    
            //   if ($column_name == 'email') {
            //     $builder->like(array('users.email' => $filter_value));
            //   }
            // }
          }
    
          if ($common_filter_value != false) {
            $builder->like(array('question' => $common_filter_value));
            $builder->like(array('answer' => $common_filter_value));
            $builder->orLike(array('in_order' => $common_filter_value));
            $builder->orLike(array('created_at' => $common_filter_value));
          }
          //$builder->limit($limit['length'], $limit['start']);
          $builder = $builder->get();
          $faqs = $builder->getResultArray();
          
          $totalFiltered = count($faqs);
        }
    
        if (!empty($totalFiltered)) {
          $totalFiltered = $totalFiltered;
        } else {
          $totalFiltered = $totalData;
        }
       
        if ($faqs == false || empty($faqs) || $faqs == null) {
          $faqs = false;
        }

       //echo "<pre>";print_r($faqs);die();
       if($faqs){

        foreach($faqs as $key=>$val){
            $date_string=date_create($val['created_at']);
           $faqs[$key]['created_at'] = date_format($date_string,"d-m-Y");
        }
       }
      
    
        $json_data['draw'] = intval($requestData['draw']);
        $json_data['recordsTotal'] = intval($totalData);
        $json_data['recordsFiltered'] = intval($totalFiltered);
        $json_data['data'] = $faqs;
    
        echo (json_encode($json_data));
        
    }

    public function faqEdit($id) { 
        $faq_model = new Faqmodel();
        $data['faq'] = $faq_model->where('id',$id)->first();
    
        if ($this->request->getMethod() == 'post') {

            if ($this->validate('addfaq')) {
                $data=[
                   'question' => $this->request->getVar('question'),
                   'answer' => $this->request->getVar('answer'),
                ];
                $faq_model = new Faqmodel();

                $update = $faq_model->update($id,$data);

                if($update){
                    return redirect()->to(base_url('faqedit/'.$id))->with('success', 'Faq update successfully!');
                }
            }else {
                $data['validation'] = $this->validator;
                return view('faq/add_faq', $data);
            }
         }
        return view('faq/faq_edit',$data);
    }

    public function faqDelete($id) {
        $faq_model = new Faqmodel();
        $delete = $faq_model->where('id',$id)->delete();

        if($delete){
            return redirect()->to(base_url('faqlist'))->with('success', 'Faq delete successfully!');
        }
    }

}
