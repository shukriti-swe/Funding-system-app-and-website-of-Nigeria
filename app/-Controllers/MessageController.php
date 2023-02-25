<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SupportMessageModel;
use Exception;
use ReflectionException;
use DateTime;

class MessageController extends BaseController {

    public function messageList() {
        $now = date('Y-m-d H:i:s');

        $builder = $this->db->table('support_message as sp');
        $builder->join('users u', 'sp.user_id = u.id');
        $builder->join('users_groups ug', 'sp.user_id = ug.user_id');
        $builder->select("sp.id, sp.user_id, sp.receiver_id, sp.ticket_id, sp.message,sp.attachment, TIMESTAMPDIFF(MINUTE,sp.created_at,'$now') as sent_before_min,u.user_profile_image as sender_profile_image,CONCAT(u.first_name, ' ', u.last_name) AS sender_original_name,ug.group_id");
        $builder->where('sp.user_id', CURRENT_USER['id']);
        $builder->orWhere('sp.receiver_id', CURRENT_USER['id']);
        $builder->orderBy('sp.id','desc');
        $query = $builder->get();
        $results = $query->getResultArray();

        foreach($results as $key=>$sender){
            if($sender['group_id']==2 || $sender['group_id']==1){
                $results[$key]['sender_profile_image']="https://d4zd5125vr4p3.cloudfront.net/images/62429e765a815.png";

                $results[$key]['sender_original_name']=$sender['sender_original_name'];
                $results[$key]['sender_name']=lang('Message.support');

            }else{
                $results[$key]['sender_profile_image']=$sender['sender_profile_image'];
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
                $results[$key]['receiver_profile_image']="https://d4zd5125vr4p3.cloudfront.net/images/62429e765a815.png";

                $results[$key]['receiver_name']=lang('Message.support');
                $results[$key]['receiver_original_name']=$results2[0]['reciever_name'];

            }else{
                $results[$key]['receiver_profile_image']=$results2[0]['receiver_profile_image'];
                $results[$key]['receiver_name']=lang('Message.you');
                $results[$key]['receiver_original_name']=$results2[0]['reciever_name'];
            }

            
        }



        $sucess = $this->generateSuccess(lang('Message.message_list'), $results);
        return $this->getResponse($sucess);
    }

    public function messageSend() {

        $message = $this->request->getPost('message');

        if (!$this->request->getPost('message')) {
            $error = $this->generateError(lang('Message.message_mandatory'));
            return $this->getResponse($error, ResponseInterface::HTTP_BAD_REQUEST);
        }

        $supportMessageModel = new SupportMessageModel();

        $messageData['user_id'] = CURRENT_USER['id'];
        //$messageData['receiver_id'] = ($this->request->getPost('receiver_id')) ? $this->request->getPost('receiver_id') : 1;
        //PICK a receiver id from database
        $receiver_id = $this->getSupportUser();
        
        $messageData['receiver_id']=$receiver_id;
        $messageData['ticket_id'] = ($this->request->getPost('ticket_id')) ? $this->request->getPost('ticket_id') : time();
        $messageData['message'] = $this->request->getPost('message');

        if(!empty($_FILES['attachment']['name'])){
            if(is_object($this->uploadAttachment())){
                return $this->uploadAttachment();
            }else{
                $messageData['attachment'] = $this->uploadAttachment();
            }
        }

        $isSuccess = $supportMessageModel->save($messageData);

        if ($isSuccess) {
            $sucess = $this->generateSuccess(lang('Message.message_send_success'), $messageData);
            return $this->getResponse($sucess);
        } else {
            $error = $this->generateError(lang('Home.something_went_wrong'));
            return $this->getResponse($error, ResponseInterface::HTTP_BAD_REQUEST);
        }
    }

    public function uploadAttachment(){
        
        $input = $this->validate([
            'attachment' => [
                'ext_in[attachment,PDF,pdf,docx,doc]',
            ]
        ]);
       
        if ($input) {
            $error = $this->generateError($this->validator->getErrors());
            return $this->getResponse($error, ResponseInterface::HTTP_OK);
        } else {
           
            $config = config('AWS');
            $credentials = new \Aws\Credentials\Credentials($config->accessKey, $config->secretKey);
            
            $s3Client = new \Aws\S3\S3Client([
                'region' => $config->region,
                'version' => '2006-03-01',
                'credentials' => $credentials 
            ]); 

            $extension = pathinfo(parse_url($_FILES['attachment']['name'], PHP_URL_PATH), PATHINFO_EXTENSION);
            $data = file_get_contents($_FILES['attachment']['tmp_name']);
            
            $filename = uniqid() .'.'.$extension;
            $bucket = $config->bucket;
            $documentName = '';
            $document = '';
            
            try {
                $upload = $s3Client->upload($bucket, 'attachment/' . $filename, $data);
                $documentName = $upload->get('ObjectURL');
                $document = str_replace($config->bucket_s3_endpoint, $config->cloud, $documentName);
                
            } catch (Exception $ex) {
                $err = array('upload'=>'Server error occured');
                $error = $this->generateError($err);
                return $this->getResponse($error, ResponseInterface::HTTP_OK);
            }

           return $document;
        }
        
        
    }

    public function getSupportUser(){
        // For now taking group 2 admin users
        $group = 2;
         
        $builder = $this->db->table('users as u');
        $builder->join('users_groups ug', 'u.id = ug.user_id');
        $builder->select("u.id");
        $builder->where('ug.group_id', $group);
        $builder->orderBy('rand()');
        $query = $builder->get();
        $results = $query->getResultArray();  
        if(count($results)){
            return $id = $results[0]['id'];
        }else{
            return 0;
        }
    }

}