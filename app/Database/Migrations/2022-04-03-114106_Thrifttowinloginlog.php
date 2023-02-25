<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttowinloginlog extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('thrift_two_win_login_logs')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                ],
                'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
               
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('thrift_two_win_login_logs');
        }
    }

    public function down()
    {
        $this->forge->dropTable('thrift_two_win_login_logs');
    }
}
