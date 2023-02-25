<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\NotificationModel;

class ProfileController extends BaseController {

    public function updateDeviceId() {

        $deviceOs = $this->request->getPost('device_os');
        $deviceId = $this->request->getPost('device_id');

        $user = new UserModel();
        $user->update(CURRENT_USER['id'], ['device_os' => $deviceOs, 'device_id' => $deviceId]);

        $sucess = $this->generateSuccess(lang('Profile.device_id_updated'), ['device_os' => $deviceOs, 'device_id' => $deviceId]);

        return $this->getResponse($sucess);
    }

    public function notifications() {

        $notificationModel = new NotificationModel(); 
        
        $builder = $this->db->table('notifications as n');
        $builder->select('n.id, n.title, n.description, n.sender_id, u.first_name, u.last_name, n.created_at');
        $builder->where('n.receiver_id', CURRENT_USER['id']); 
        $builder->join('users as u', 'u.id = n.sender_id');
        $builder->orderBy('n.created_at','desc');
        $query = $builder->get();
        $notifications = $query->getResultArray();

        $sucess = $this->generateSuccess(lang('Profile.list_notification'), $notifications);
        return $this->getResponse($sucess);
    }

    public function sendPushNotification() {

        $userId = $this->request->getPost('userId');
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');

        $user = new UserModel();
        $userInfo = $user->select(['id', 'mem_id_num', 'email', 'first_name', 'last_name', 'device_id'])->find($userId);

        if ($userInfo && $userInfo['device_id'] != null) {

            $data = [
                "to" => $userInfo['device_id'], // for single device id
                "data" => ["title" => $title, "body" => $description]
            ];

            $headers = ['Authorization:key=' . getenv('FIREBASE_SERVER_KEY'), 'Content-Type: application/json'];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, getenv('FIREBASE_SERVER_URL'));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $response = curl_exec($ch);
            curl_close($ch);

            if ($response) {

                $notificationModel = new NotificationModel();

                $notify['title'] = $title;
                $notify['description'] = $description;
                $notify['sender_id'] = CURRENT_USER['id'];
                $notify['receiver_id'] = $userInfo['id'];

                $notificationModel->save($notify);
            }

            return $response;

        }

        $error = $this->generateError(lang('Profile.profile_information_missing'));
        return $this->getResponse($error, ResponseInterface::HTTP_OK);
    }

    public function balanceInfo() {

        //$notificationModel = new NotificationModel(); 
        
        $builder = $this->db->table('thrift_two_win_referral_amount');
        $builder->select('sum(referral_amount) as referral_amount');
        $builder->where('user_id', CURRENT_USER['id']); 
        $query = $builder->get();
        $referral_amount = $query->getResultArray();
        if(empty($referral_amount[0]['referral_amount'])){
            $referral_amount[0]['referral_amount']=0;
        }
     
        $date = date('Y-m-d');
        $builder = $this->db->table('thrift_two_win_deposits t1');
        $builder->select('sum(t1.deposits_amount) as total_deposit');
        $builder->join('thrift_two_win t2', 't2.id  = t1.thrift_group_id');
        $builder->where('t1.user_id', CURRENT_USER['id']); 
        $builder->where('t2.thrift_group_end_date >=', $date);
        $query = $builder->get();
        
        $deposit_amount = $query->getResultArray();
        
        $data['thrift_balance']= $deposit_amount[0]['total_deposit'];
        $data['referral_amount']= $referral_amount[0]['referral_amount'];
        $data['available_balance']= $this->getAmount($referral_amount[0]['referral_amount']);

        $sucess = $this->generateSuccess(lang('Account.show_all_balance'), $data);
        return $this->getResponse($sucess);
    }

    public function getAmount($referral_amount)
    {
        $builder = $this->db->table('thrift_two_win_deposits');
        $builder->selectSum('deposits_amount');
        $builder->where('user_id', CURRENT_USER['id']);
        $query = $builder->get();
        $dp_amount = $query->getrow();
        $deposits_amount = 0;
        if($dp_amount){
            $deposits_amount=$dp_amount->deposits_amount;
        }
        
        $builder = $this->db->table('thrift_two_win_withdraw');
        $builder->selectSum('withdraw_amount');
        $builder->where('user_id', CURRENT_USER['id']);
        $query = $builder->get();
        $wthdraw = $query->getrow();
        $withdraw_amount = 0;

        if ($wthdraw != null) {
            $withdraw_amount =  $wthdraw->withdraw_amount;
        }

        $balance =  ($deposits_amount+$referral_amount) - $withdraw_amount;
        return $balance;
    }

}
