<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TwoFactor extends Migration {

    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'bigint',
                'auto_increment' => true,
            ],
            'otp' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => '11'
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'default' => null
            ],
            'read' => [
                'type' => 'tinyint',
                'default' => 0
            ],
            'created_at datetime default current_timestamp',
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->createTable('two_factor_auth');
    }

    public function down() {
        $this->forge->dropTable('two_factor_auth');
    }

}
