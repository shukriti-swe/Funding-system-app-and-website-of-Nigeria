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

}
