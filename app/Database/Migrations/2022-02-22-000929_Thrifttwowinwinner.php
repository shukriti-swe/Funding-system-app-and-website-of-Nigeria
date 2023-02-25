<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttwowinwinner extends Migration {

    public function up() {
        if (!$this->db->tableExists('thrift_two_win_winner')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                ],
                'thrift_group_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                ],
                'user_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'constraint' => 11
                ],                
                'status' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'constraint' => 1
                ],

                'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            ]);

            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'NO ACTION');
            $this->forge->addForeignKey('thrift_group_id', 'thrift_two_win', 'id', 'NO ACTION', 'NO ACTION');
            $this->forge->createTable('thrift_two_win_winner');
        }
    }

    public function down() {
        $this->forge->dropTable('thrift_two_win_winner');
    }

}
