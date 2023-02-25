<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Preuser extends Migration {

    public function up() {
        if (!$this->db->tableExists('pre_user')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => true,
                ],
                'first_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'last_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'phone' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'verification' => [
                    'type' => 'tinyint',
                    'constraint' => '1',
                    'default' => 0
                ],
                'activation_code' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'user_dob' => [
                    'type' => 'VARCHAR',
                    'constraint' => '30',
                ],
                'user_age' => [
                    'type' => 'INT',
                    'constraint' => '3',
                ],
                'user_gender' => [
                    'type' => 'VARCHAR',
                    'constraint' => '10',
                ],
                'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('pre_user');
        }
    }

    public function down() {
        $this->forge->dropTable('pre_user');
    }

}
