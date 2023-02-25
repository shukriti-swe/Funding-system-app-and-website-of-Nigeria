<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttwowin extends Migration {

    public function up() {
        if (!$this->db->tableExists('thrift_two_win')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                ],
                'thrift_group_number' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'thrift_name' => [
                    'type' => 'varchar',
                    'constraint' => '255'
                ],
                'thrift_description' => [
                    'type' => 'text',
                    'null' => true,
                ],                
                'thrift_group_term_duration' => [
                    'type' => 'INT',
                    'constraint' => 11
                ],
                'thrift_group_product_price' => [
                    'type' => 'decimal',
                    'constraint' => 20
                ],
                'thrift_group_start_date' => [
                    'type' => 'timestamp',
                    'null' => true,
                ],                
                'thrift_group_member_count' => [
                    'type' => 'INT',
                    'constraint' => 1
                ],

                'thrift_group_creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP',

                'created_member' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'constraint' => '11'
                ],
                'thrift_group_open' => [
                    'type' => 'INT',
                    'constraint' => '1'
                ],

                'thrift_group_end_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            ]);

            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('created_member', 'users', 'id', 'NO ACTION', 'NO ACTION');
            $this->forge->createTable('thrift_two_win');
        }
    }

    public function down() {
        $this->forge->dropTable('thrift_two_win');
    }

}
