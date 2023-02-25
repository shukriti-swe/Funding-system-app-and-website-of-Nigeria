<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttowinfaq extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('thrift_two_win_faq')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                ],
                'question' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'answer' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'in_order' => [
                    'type' => 'INT',
                    'constraint' => 11,
                ],
                'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
               
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('thrift_two_win_faq');
        }
    }

    public function down()
    {
        $this->forge->dropTable('thrift_two_win_faq');
    }
}
