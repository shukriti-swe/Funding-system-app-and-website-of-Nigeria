<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pins extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('thrift_two_win_pins')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                ],
                'pin' => [
                    'type' => 'varchar',
                    'constraint' => 60
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
                'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
            $this->forge->createTable('thrift_two_win_pins');
        }
    }

    public function down()
    {
        $this->forge->dropTable('thrift_two_win_pins');
    }
}
