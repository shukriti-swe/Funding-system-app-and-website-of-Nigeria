<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttwowindeposits extends Migration {

    public function up() {
        if (!$this->db->tableExists('thrift_two_win_deposits')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                ],
                'thrift_group_id' => [
                    'type' => 'INT',
                    'constraint' => 11
                ],
                'deposits_amount' => [
                    'type' => 'decimal',
                    'constraint' => 20
                ],
                'deposits_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'user_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'constraint' => '11'
                ],
                'status' => [
                    'type' => 'tinyint',
                    'constraint' => 1,
                    'default' => 1
                ],
                'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'NO ACTION');
            $this->forge->addForeignKey('thrift_group_id', 'thrift_two_win', 'id', 'NO ACTION', 'NO ACTION');
            $this->forge->createTable('thrift_two_win_deposits');
        }
    }

    public function down() {
        $this->forge->dropTable('thrift_two_win_deposits');
    }

}
