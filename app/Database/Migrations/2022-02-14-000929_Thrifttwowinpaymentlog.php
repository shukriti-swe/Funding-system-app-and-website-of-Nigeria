<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttwowinpaymentlog extends Migration {

    public function up() {
        if (!$this->db->tableExists('thrift_two_win_payment_log')) {
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
                'deposits_amount' => [
                    'type' => 'decimal',
                    'constraint' => 20
                ],
                'paystack_id' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'payment_type' => [
                    'type' => 'varchar',
                    'constraint' => 20
                ],
                'payment_info' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ],
                'deposits_date' => [
                    'type' => 'varchar',
                    'constraint' => 10
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
            $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'NO ACTION');
            $this->forge->addForeignKey('thrift_group_id', 'thrift_two_win', 'id', 'NO ACTION', 'NO ACTION');
            $this->forge->createTable('thrift_two_win_payment_log');
        }
    }

    public function down() {
        $this->forge->dropTable('thrift_two_win_payment_log');
    }

}
