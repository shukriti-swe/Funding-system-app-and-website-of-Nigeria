<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttwowinreferralamount extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('thrift_two_win_referral_amount')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,  
                ],
                'referral_amount' => [
                    'type' => 'DECIMAL',
                    'constraint' => '10,2'
                ],
                'purpose' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                
                'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'NO ACTION');
    
            $this->forge->createTable('thrift_two_win_referral_amount');
        }
    }

    public function down()
    {
        $this->forge->dropTable('thrift_two_win_referral_amount');
    }
}
