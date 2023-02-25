<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = [
        'email',
        'password',
        'active',
        'phone',
        'first_name',
        'last_name',
        'mem_id_num',
        'activation_code',
        'verification',
        'forgotten_password_code',
        'forgotten_password_time',
        'user_age',
        'user_dob',
        'user_gender',
        'user_profile_image',
        'device_os',
        'device_id',
        'user_bvn',
        'referred_by',
        'pay_customer_id'
    ];
    
    protected $updatedField = ' ';
    protected $primaryKey       = 'id';
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data): array
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    protected function beforeUpdate(array $data): array
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    private function getUpdatedDataWithHashedPassword(array $data): array
    {
       
     
        if (isset($data['data']['password'])  && strlen($data['data']['password']) < 18) {
            $plaintextPassword = $data['data']['password'];
            $data['data']['password'] = $this->hashPassword($plaintextPassword);
        }

        return $data;
    }

    private function hashPassword(string $plaintextPassword): string
    {
        return password_hash($plaintextPassword, PASSWORD_BCRYPT);
    }
                                      
    public function findUserByEmailAddress(string $emailAddress)
    {
        $user = $this
            ->select('id, email, password, first_name, last_name, phone, user_dob, user_gender, user_profile_image, referred_by')
            ->asArray()
            ->where(['email' => $emailAddress])
            ->first();

        if (!$user) 
            throw new Exception('User does not exist for specified email address');

        return $user;
    }

    public function findUserById(string $id)
    {
      
         $user = $this
            ->select('id, email, first_name, last_name, phone, user_dob, user_gender, user_profile_image, device_id, referred_by')
            ->asArray()
            ->where(['id' => $id])
            ->first();
        return $user;
    }

    public function findUserVerification($id, $code)
    {
        $user = $this
            ->selectCount('id')
            ->asArray()
            ->where(['id' => $id, 'activation_code'=>$code])
            ->first();

        return $user['id'];    
    }


    public function findUserByMemberbyNum(string $member_number)
    {
        $user = $this
            ->asArray()
            ->where(['mem_id_num' => $member_number])
            ->first();

        return $user;
    }

}