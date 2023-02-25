<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $this->insertSettings();
    }
    private function insertSettings() {
        $builder_chk = $this->db->table('groups');
        $builder_chk->where('name', 'superadmin');
        $query = $builder_chk->get();
        $chartValue = $query->getResultArray();
        if(count($chartValue)==0)
        {
        
            $builder = $this->db->table('groups');
            $builder->insertBatch([
                [
                    'id' => '1',
                    'name' => 'superadmin',
                    'description' => 'This is super admin',
                ],
                [
                    'id' => '2',
                    'name' => 'admin',
                    'description' => 'This is admin'
                ],
                [
                    'id' => '3',
                    'name' => 'users',
                    'description' => 'This is users'
                ],
            
            ]);

            $builder_u = $this->db->table('users');
            $builder_u->insertBatch([
                [
                    'id' => '101',
                    'mem_id_num' => 'T38939SD',
                    'email' => 'superadmin+1@obsvirtual.com',
                    'password' => '$2y$10$JungiTIp0NN1rpUMFsWEmuBn4s0x1xCzM7h2kYfsst6b/utmqF0ea',
                    'salt' => '',
                    'first_name' => 'Mr Super',
                    'last_name' => 'Admin','phone' => '098765432435',
                    'activation_code' => '',
                    'user_dob' => '949471200',
                    'user_age' => '22',
                    'user_gender' => 'male',
                    'user_profile_image' => '',
                    'forgotten_password_code' => '',
                    'forgotten_password_time' => '0',
                    'remember_code' => 'Tzn6OfVoYDbw8J9SI5jvakhHEiyN1dxRUsMBrGpg',
                    'last_login' => '0',
                    'device_id' => NULL,
                    'device_os' => NULL,
                    'active' => '1',
                    'user_bvn' => '77777',
                    'referred_by' => '0',
                    'pay_customer_id' => NULL
                ],
                [
                    'id' => '102',
                    'mem_id_num' => 'T72341LM',
                    'email' => 'admin+2@obsvirtual.com',
                    'password' => '$2y$10$oyzr.P.hQPpd/2KMALamfuGGL0pxmT0i5vwNFvFIq5QsWFh7XbqUO',
                    'salt' => '',
                    'first_name' => 'Mr',
                    'last_name' => 'Admin',
                    'phone' => '098765432435',
                    'activation_code' => '',
                    'user_dob' => '949471200',
                    'user_age' => '22',
                    'user_gender' => 'male',
                    'user_profile_image' => '',
                    'forgotten_password_code' => '',
                    'forgotten_password_time' => '0',
                    'remember_code' => '',
                    'last_login' => '0',
                    'device_id' => NULL,
                    'device_os' => NULL,
                    'active' => '1',
                    'user_bvn' => '77777',
                    'referred_by' => '0',
                    'pay_customer_id' => NULL
                ],
               
            
            ]);

            $builder_ug = $this->db->table('users_groups');
            $builder_ug->insertBatch([
                [
                   
                    'user_id' => '101',
                    'group_id' => '1'
                ],
                [
                   
                    'user_id' => '102',
                    'group_id' => '2'
                ],
                
            
            ]);

        }
       
    }
}
