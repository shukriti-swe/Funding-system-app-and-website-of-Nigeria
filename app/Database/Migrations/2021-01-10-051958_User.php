<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration {

    public function up() {
        if (!$this->db->tableExists('users')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,                    
                    'auto_increment' => true,
                ],
                'mem_id_num' => [
                    'type' => 'VARCHAR',
                    'constraint' => 50,
                    'default' => ''
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],  
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],   
                'salt' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'default'        => '',
                ],                                           
                'first_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'default'        => '',
                ],
                'last_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'default'        => '',
                ],
                'phone' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'default'        => '',
                ],
                'activation_code' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'default'        => '',
                ],
                'user_dob' => [
                    'type' => 'VARCHAR',
                    'constraint' => '30',
                    'default'        => '',
                ],
                'user_age' => [
                    'type' => 'INT',
                    'constraint' => '3',
                    'default'        => 18,
                ],
                'user_gender' => [
                    'type' => 'VARCHAR',
                    'constraint' => '10',
                    'default'        => '',
                ],
                'user_profile_image' => [
                    'type' => 'TEXT',
                    'null' => true,
                    'default'        => '',
                ], 
                'forgotten_password_code' => [
                    'type' => 'VARCHAR',
                    'constraint' => '40',
                    'default'        => '',
                ],                  
                'forgotten_password_time' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ], 
                'remember_code' => [
                    'type' => 'VARCHAR',
                    'constraint' => '40',
                    'default'        => '',
                ], 
                'last_login' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ],
                'active' => [
                    'type' => 'INT',
                    'unsigned' => true,
                ], 
                'user_bvn' => [
                    'type' => 'VARCHAR',
                    'constraint' => '11',
                    'default'    => '',
                ],                
                                 
                          
                'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('users');
        }
    }

    public function down() {
        $this->forge->dropTable('pre_user');
    }

}
