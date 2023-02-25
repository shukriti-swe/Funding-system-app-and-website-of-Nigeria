<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttowinmessagearchive extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('thrift_two_win_message_archive')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                ],
                'ticket_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                ],
                'message_date' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
               
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('thrift_two_win_message_archive');
        }
    }

    public function down()
    {
        $this->forge->dropTable('thrift_two_win_message_archive');
    }
}