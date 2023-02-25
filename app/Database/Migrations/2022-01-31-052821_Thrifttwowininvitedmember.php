<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttwowininvitedmember extends Migration {

    public function up() {

        if (!$this->db->tableExists('thrift_two_win_invited_member')) {
            $this->forge->addField(
                    [
                        'id' => [
                            'type' => 'INT',
                            'constraint' => 11,
                            'auto_increment' => true,
                        ],
                        'invited_by_user' => [
                            'type' => 'INT',
                            'unsigned' => true,
                            'constraint' => '11'
                        ],
                        'thrift_id' => [
                            'type' => 'INT',
                            'constraint' => 11
                        ],
                        'invited_name' => [
                            'type' => 'varchar',
                            'constraint' => '255'
                        ],
                        'invited_email' => [
                            'type' => 'varchar',
                            'constraint' => '255'
                        ],
                        'is_join' => [
                            'type' => 'INT',
                            'constraint' => '1'
                        ],
                        'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                        'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('invited_by_user', 'users', 'id', 'NO ACTION', 'NO ACTION');
            $this->forge->addForeignKey('thrift_id', 'thrift_two_win', 'id', 'NO ACTION', 'NO ACTION');
            $this->forge->createTable('thrift_two_win_invited_member');
        }
    }

    public function down() {
        $this->forge->dropTable('thrift_two_win_invited_member');
    }

}
