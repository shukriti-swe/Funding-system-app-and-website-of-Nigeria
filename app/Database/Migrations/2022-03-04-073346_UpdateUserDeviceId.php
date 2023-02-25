<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateUserDeviceId extends Migration {

    public function up() {
        $fields = [
            'device_os' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'after' => 'last_login',
                'default' => NULL,
                'null' => TRUE,
            ],
            'device_id' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'after' => 'last_login',
                'default' => NULL,
                'null' => TRUE,
            ]
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down() {
        $this->forge->dropColumn('users', ['device_id']);
    }

}
