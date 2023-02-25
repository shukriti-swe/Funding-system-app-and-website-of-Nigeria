<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttowinuserbvn extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('thrift_two_win_user_bvn')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                ],
                'user_id'  => [
                    'type'           => 'INT',
                    'unsigned'           => true,
                    'constraint'     => 11
                ],
                'bank_code' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                ],
                'account_number' => [
                    'type' => 'INT',
                    'constraint' => 10,
                ],
                'user_bvn' => [
                    'type' => 'INT',
                    'constraint' => 10,
                ],
                'beneficiary' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'report' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
               
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'NO ACTION');
            $this->forge->createTable('thrift_two_win_user_bvn');
        }
    }

    public function down()
    {
        $this->forge->dropTable('thrift_two_win_user_bvn');
    }
}
