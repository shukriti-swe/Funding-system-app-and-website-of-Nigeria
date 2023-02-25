<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupportMessageModel;
use App\Models\NotificationModel;
use App\Models\UserModel;
use App\Models\ThrifttowinusergroupModel;
use App\Models\Thrifttowingroupmodel;
use App\Models\Groupsmodel;

use DateTime;


class MessageController extends BaseController
{
    public function writeMessage()
    {
        $userId = session()->get('id');
        $getAllUsers = $this->get_all_USERS($userId);

        $data = [
            'getAllUsers' => $getAllUsers,

        ];

        return view('message/write_message', $data);
    }

    public function outbox()
    {
        $data['getAllSupMsg'] = $this->get_all_OUTBOX_SUPPORT_MESSAGE();
        $supportMsg = new SupportMessageModel();

 
        if($this->request->getMethod() == 'post'){
            $maxValue = $this->getMaxValueInSupportMessageTable();
            $info = $this->request->getVar();
            $userId = session()->get('id');
            $insertMsg = [
                'user_id' => $userId,
                'receiver_id' => $info['to_whom'],
                'ticket_id' => $maxValue['max_value'] + 1,
                'message' => $info['message_text'],
            ];

            $supportMsg->save($insertMsg);
            return redirect()->to(base_url('outbox'))->with('success', 'Message insert successfully!');
        }

        return view('message/outbox', $data);
    }
    public function inbox()
    {
        $data['getAllSupMsg'] = $this->get_all_INBOX_SUPPORT_MESSAGE();
        $supportMsg = new SupportMessageModel();


        if($this->request->getMethod() == 'post'){
            $maxValue = $this->getMaxValueInSupportMessageTable();
            $info = $this->request->getVar();
            $userId = session()->get('id');
            $insertMsg = [
                'user_id' => $userId,
                'receiver_id' => $info['to_whom'],
                'ticket_id' => $maxValue['max_value'] + 1,
                'message' => $info['message_text'],
            ];


            $supportMsg->save($insertMsg);
            return redirect()->to(base_url('inbox'))->with('success', 'Message insert successfully!');
        }

        return view('message/inbox', $data);
    }

    public function inboxViewMessage($id, $ticketId){
        $supportMsg = new SupportMessageModel();
        $now = date('Y-m-d H:i:s');
        
        $builder =$this->db->table('support_message sp');
        $builder->select("sp.id, sp.user_id, sp.receiver_id, sp.ticket_id, sp.message,sp.attachment, sp.created_at, TIMESTAMPDIFF(MINUTE,sp.created_at,'$now') as sent_before_min,u.user_profile_image as sender_profile_image,CONCAT(u.first_name, ' ', u.last_name) AS sender_original_name,ug.group_id");
        $builder->join('users u', 'sp.user_id = u.id');
        $builder->join('users_groups ug', 'sp.user_id = ug.user_id');
        $builder->where('sp.id',$id);
        $query = $builder->get();
        $results = $query->getResultArray();
        

        foreach($results as $key=>$sender){
            if($sender['group_id']==2 || $sender['group_id']==1){
                $results[$key]['sender_profile_image']=getenv('aws.cloud').'/images/62429e765a815.png';

                $results[$key]['sender_original_name']=$sender['sender_original_name'];
                $results[$key]['sender_name']=lang('Message.support');

            }else{
                if(!empty($sender['sender_profile_image'])){
                 $results[$key]['sender_profile_image']=$sender['sender_profile_image'];
                }else{
                    $results[$key]['sender_profile_image']= base_url().'/assets/backend_assets/images/blank-user.png';
                }
                $results[$key]['sender_original_name']=$sender['sender_original_name'];
                $results[$key]['sender_name']=lang('Message.you');
            }
            $reciever_id=$sender['receiver_id'];
            
            $builder = $this->db->table('users as u');
            $builder->join('users_groups ug', 'u.id = ug.user_id');
            $builder->select('u.id,u.user_profile_image as receiver_profile_image, ug.group_id,CONCAT(u.first_name, " ", u.last_name) AS reciever_name');
            $builder->where('u.id', $reciever_id);
            $query = $builder->get();
            $results2 = $query->getResultArray();
            
            if($results2[0]['group_id']==2 || $results2[0]['group_id']==1){
                $results[$key]['receiver_profile_image']=getenv('aws.cloud').'/images/62429e765a815.png';

                $results[$key]['receiver_name']=lang('Message.support');
                $results[$key]['receiver_original_name']=$results2[0]['reciever_name'];

            }else{
                $results[$key]['receiver_profile_image']=$results2[0]['receiver_profile_image'];
                $results[$key]['receiver_name']=lang('Message.you');
                $results[$key]['receiver_original_name']=$results2[0]['reciever_name'];
            }
            
        }
        
        $data['getmgsrow'] = $results[0];


        $data['getreplytext'] = $this->getCommentReplyForSupportMessageTableInbox($id,$ticketId);
        
        
        if($this->request->getMethod() == 'post'){
            $userId = session()->get('id');
            $info = $this->request->getVar();

            $p_data['user_id'] = $userId;
            $p_data['receiver_id'] = $info['receiver_id'];
            $p_data['ticket_id'] = $ticketId;
            $p_data['message'] = $info['message_text'];

            $supportMsg->save($p_data); 

            return redirect()->to(base_url('inbox_view_message/'.$id.'/'.$ticketId))->with('success', 'Successful! Message Posted. Your comment has been posted!');
        }

        return view('message/inbox_message_details_page', $data);
    }
    public function viewMessage($id, $ticketId)
    {
        $supportMsg = new SupportMessageModel();
        
        $now = date('Y-m-d H:i:s');
        
        $builder =$this->db->table('support_message sp');
        $builder->select("sp.id, sp.user_id, sp.receiver_id, sp.ticket_id, sp.message,sp.attachment, sp.created_at, TIMESTAMPDIFF(MINUTE,sp.created_at,'$now') as sent_before_min,u.user_profile_image as sender_profile_image,CONCAT(u.first_name, ' ', u.last_name) AS sender_original_name,ug.group_id");
        $builder->join('users u', 'sp.user_id = u.id');
        $builder->join('users_groups ug', 'sp.user_id = ug.user_id');
        $builder->where('sp.id',$id);
        $query = $builder->get();
        $results = $query->getResultArray();


        foreach($results as $key=>$sender){
            if($sender['group_id']==2 || $sender['group_id']==1){
                $results[$key]['sender_profile_image']=getenv('aws.cloud').'/images/62429e765a815.png';

                $results[$key]['sender_original_name']=$sender['sender_original_name'];
                $results[$key]['sender_name']=lang('Message.support');

            }else{
                if(!empty($sender['sender_profile_image'])){
                 $results[$key]['sender_profile_image']=$sender['sender_profile_image'];
                }else{
                    $results[$key]['sender_profile_image']= base_url().'/assets/backend_assets/images/blank-user.png';
                }
                $results[$key]['sender_original_name']=$sender['sender_original_name'];
                $results[$key]['sender_name']=lang('Message.you');
            }
            $reciever_id=$sender['receiver_id'];
            
            $builder = $this->db->table('users as u');
            $builder->join('users_groups ug', 'u.id = ug.user_id');
            $builder->select('u.id,u.user_profile_image as receiver_profile_image, ug.group_id,CONCAT(u.first_name, " ", u.last_name) AS reciever_name');
            $builder->where('u.id', $reciever_id);
            $query = $builder->get();
            $results2 = $query->getResultArray();
            
            if($results2[0]['group_id']==2 || $results2[0]['group_id']==1){
                $results[$key]['receiver_profile_image']=getenv('aws.cloud').'/images/62429e765a815.png';

                $results[$key]['receiver_name']=lang('Message.support');
                $results[$key]['receiver_original_name']=$results2[0]['reciever_name'];

            }else{
                $results[$key]['receiver_profile_image']=$results2[0]['receiver_profile_image'];
                $results[$key]['receiver_name']=lang('Message.you');
                $results[$key]['receiver_original_name']=$results2[0]['reciever_name'];
            }
            
        }
        
     
        $data['getmgsrow'] = $results[0];
       
        $data['getreplytext'] = $this->getCommentReplyForSupportMessageTable($id,$ticketId);
        
        if($this->request->getMethod() == 'post'){
            $userId = session()->get('id');
            $info = $this->request->getVar();

            $p_data['user_id'] = $userId;
            $p_data['receiver_id'] = $info['receiver_id'];
            $p_data['ticket_id'] = $ticketId;
            $p_data['message'] = $info['message_text'];

            $supportMsg->save($p_data);

            return redirect()->to(base_url('view_message/'.$id.'/'.$ticketId))->with('success', 'Successful! Message Posted. Your comment has been posted!');
        }

        return view('message/message_details_page', $data);
    }
    public function sendMessage($id)
    {

        $supportMsg = new SupportMessageModel();
        $data['getmgsrow'] = $supportMsg->where('id',$id)->first();

        return view('message/message_details_page', $data);
    }
    public function deleteMessage($id)
    {
        $supportMsg = new SupportMessageModel();
        $supportMsg->where('id',$id)->delete();


        return redirect()->to(base_url('outbox'))->with('success', 'Message Delete Successfully!');
    }

    protected function get_all_USERS($id){
        $builder =$this->db->table('users u');
        $builder->select('u.id,u.first_name,u.last_name');
        $builder->join('users_groups ug', 'u.id = ug.user_id');
        $subQuery = $this->db->table('users')->select('id')->where('id', $id);
		$builder->where('ug.group_id',3);
        $builder->whereNotIn('u.id', $subQuery);

        $query = $builder->get();

        $results = $query->getResultArray();

        return $results;
    }
    protected function get_all_OUTBOX_SUPPORT_MESSAGE(){
        $userId = session()->get('id');
        $group_model =  new Thrifttowingroupmodel();
        $get_group = $group_model->where('name','admin')->orWhere('name','superadmin')->findall();
        
        $builder =$this->db->table('support_message t1');
        $builder->select('t1.id,t1.user_id,t1.receiver_id,t1.message,t1.ticket_id,t1.created_at');
        $builder->join('users_groups t2', 't2.user_id = t1.user_id');
        $builder->join('groups t3', 't2.group_id = t3.id');
        $builder->where('t1.user_id', $userId);
        $builder->where('t2.group_id', $get_group[0]['id']);
        $builder->orWhere('t2.group_id', $get_group[1]['id']);
     
        $builder->groupBy('t1.ticket_id', 'DESC');
        $query = $builder->get();
        
        $results = $query->getResultArray();
        return $results;
    }

    protected function get_all_INBOX_SUPPORT_MESSAGE(){
        $userId = session()->get('id');

        $group_model =  new Thrifttowingroupmodel();
        $get_group = $group_model->where('name','admin')->orWhere('name','superadmin')->findall();
        
       
        $builder =$this->db->table('support_message t1');
        $builder->select('*');
        $subQuery = $this->db->table('support_message t')->select('max(t.id) as id')->join('users_groups t5', 't5.user_id = t.receiver_id')->join('groups t6', 't5.group_id = t6.id')->where('t5.group_id', $get_group[0]['id'])->orWhere('t5.group_id', $get_group[1]['id'])->groupBy('t.ticket_id')->orderBy('t.id', 'DESC');
        $builder->whereIn('t1.id',$subQuery);

        $query = $builder->get();
        $results = $query->getResultArray();
        return $results;
    }

    protected function getMaxValueInSupportMessageTable(){
        $builder =$this->db->table('support_message');
        $builder->select('MAX(id) as max_value');
        $query = $builder->get();
        $results = $query->getRowArray();

        return $results;
    }
    protected function getCommentReplyForSupportMessageTable($id,$ticketId){
        $now = date('Y-m-d H:i:s');
        
        $builder =$this->db->table('support_message sp');
        $builder->select("sp.id, sp.user_id, sp.receiver_id, sp.ticket_id, sp.message,sp.attachment, sp.created_at, TIMESTAMPDIFF(MINUTE,sp.created_at,'$now') as sent_before_min,u.user_profile_image as sender_profile_image,CONCAT(u.first_name, ' ', u.last_name) AS sender_original_name,ug.group_id");
        $builder->join('users u', 'sp.user_id = u.id');
        $builder->join('users_groups ug', 'sp.user_id = ug.user_id');
        $subQuery = $this->db->table('support_message sp')->select('sp.id')->where('sp.id', $id);
        $builder->whereNotIn('sp.id', $subQuery);
        $builder->where('sp.ticket_id', $ticketId);
        $query = $builder->get();
        $results = $query->getResultArray();


        $builder =$this->db->table('support_message sp');
        $builder->select('sp.id, sp.user_id, sp.receiver_id, sp.ticket_id, sp.message,sp.attachment, sp.created_at,u.user_profile_image as receiver_profile_image, ug.group_id,CONCAT(u.first_name, " ", u.last_name) AS reciever_name');
        $builder->join('users u', 'sp.user_id = u.id');
        $builder->join('users_groups ug', 'sp.receiver_id = ug.user_id');
        $subQuery = $this->db->table('support_message sp')->select('sp.id')->where('sp.id', $id);
        $builder->whereNotIn('sp.id', $subQuery);
        $builder->where('sp.ticket_id', $ticketId);
        $query = $builder->get();
        $results2 = $query->getResultArray();

        foreach($results as $key=>$sender){
            if($sender['group_id']==2 || $sender['group_id']==1){
                $results[$key]['sender_profile_image']=getenv('aws.cloud').'/images/62429e765a815.png';

                $results[$key]['sender_original_name']=$sender['sender_original_name'];
                $results[$key]['sender_name']=lang('Message.support');

            }else{
                if(!empty($sender['sender_profile_image'])){
                 $results[$key]['sender_profile_image']=$sender['sender_profile_image'];
                }else{
                    $results[$key]['sender_profile_image']= base_url().'/assets/backend_assets/images/blank-user.png';
                }
                $results[$key]['sender_original_name']=$sender['sender_original_name'];
                $results[$key]['sender_name']=lang('Message.you');
            }
            
        }
        
        foreach($results2 as $key=>$value){
            if($value['group_id']==2 || $value['group_id']==1){
                $results[$key]['receiver_profile_image']=getenv('aws.cloud').'/images/62429e765a815.png';

                $results[$key]['receiver_name']=lang('Message.support');
                $results[$key]['receiver_original_name']=$value['reciever_name'];

            }else{
                if(!empty($value['receiver_profile_image'])){
                    $results[$key]['receiver_profile_image']=$value['receiver_profile_image'];
                 
                   }else{
                    $results[$key]['receiver_profile_image']= base_url().'/assets/backend_assets/images/blank-user.png';
                   }
                $results[$key]['receiver_name']=lang('Message.you');
                $results[$key]['receiver_original_name']=$value['reciever_name'];
            }
            
        }

        return $results;
    }
    protected function getCommentReplyForSupportMessageTableInbox($id,$ticketId){
        $now = date('Y-m-d H:i:s');

        $builder =$this->db->table('support_message sp');
        $builder->select("sp.id, sp.user_id, sp.receiver_id, sp.ticket_id, sp.message,sp.attachment, sp.created_at, TIMESTAMPDIFF(MINUTE,sp.created_at,'$now') as sent_before_min,u.user_profile_image as sender_profile_image,CONCAT(u.first_name, ' ', u.last_name) AS sender_original_name,ug.group_id");
        $builder->join('users u', 'sp.user_id = u.id');
        $builder->join('users_groups ug', 'sp.user_id = ug.user_id');
        $subQuery = $this->db->table('support_message sp')->select('sp.id')->where('sp.id', $id);
        $builder->whereNotIn('sp.id', $subQuery);

        $builder->where('sp.ticket_id', $ticketId);
        $query = $builder->get();
        $results = $query->getResultArray();
        


        $builder =$this->db->table('support_message sp');
        $builder->select('sp.id, sp.user_id, sp.receiver_id, sp.ticket_id, sp.message,sp.attachment, sp.created_at,u.user_profile_image as receiver_profile_image, ug.group_id,CONCAT(u.first_name, " ", u.last_name) AS reciever_name');
        $builder->join('users u', 'sp.user_id = u.id');
        $builder->join('users_groups ug', 'sp.receiver_id = ug.user_id');
        $subQuery = $this->db->table('support_message sp')->select('sp.id')->where('sp.id', $id);
        $builder->whereNotIn('sp.id', $subQuery);

        $builder->where('sp.ticket_id', $ticketId);
        $query = $builder->get();
        $results2 = $query->getResultArray();
        

        foreach($results as $key=>$sender){
            if($sender['group_id']==2 || $sender['group_id']==1){
                $results[$key]['sender_profile_image']=getenv('aws.cloud').'/images/62429e765a815.png';

                $results[$key]['sender_original_name']=$sender['sender_original_name'];
                $results[$key]['sender_name']=lang('Message.support');

            }else{
                if(!empty($sender['sender_profile_image'])){
                 $results[$key]['sender_profile_image']=$sender['sender_profile_image'];
                }else{
                    $results[$key]['sender_profile_image']= base_url().'/assets/backend_assets/images/blank-user.png';
                }
                $results[$key]['sender_original_name']=$sender['sender_original_name'];
                $results[$key]['sender_name']=lang('Message.you');
            }
            
        }
        
        foreach($results2 as $key=>$value){
            if($value['group_id']==2 || $value['group_id']==1){
                $results[$key]['receiver_profile_image']=getenv('aws.cloud').'/images/62429e765a815.png';

                $results[$key]['receiver_name']=lang('Message.support');
                $results[$key]['receiver_original_name']=$value['reciever_name'];

            }else{
                if(!empty($value['receiver_profile_image'])){
                    $results[$key]['receiver_profile_image']=$value['receiver_profile_image'];
                 
                   }else{
                    $results[$key]['receiver_profile_image']= base_url().'/assets/backend_assets/images/blank-user.png';
                   }
                $results[$key]['receiver_name']=lang('Message.you');
                $results[$key]['receiver_original_name']=$value['reciever_name'];
            }
            
        }
       
        return $results;
    }

    
}
