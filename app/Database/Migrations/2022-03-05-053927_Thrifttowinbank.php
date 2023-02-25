<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttowinbank extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('thrift_two_win_bank')) {
            $this->forge->addField([
                'bank_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                ],
                'bank_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'bank_code' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'bank_active_status' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 1
                ],
                'bank_deletion_status' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 0
                ],
               
            ]);
            $this->forge->addKey('bank_id', true);
            $this->forge->createTable('thrift_two_win_bank');
        }
    }

    public function down()
    {
        $this->forge->dropTable('thrift_two_win_bank');
    }
}
