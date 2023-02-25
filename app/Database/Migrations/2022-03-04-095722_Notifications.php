<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notifications extends Migration {

    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'bigint',
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'sender_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => '11'
            ],
            'receiver_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => '11'
            ],
            'read_status' => [
                'type' => 'tinyint', 
                'default' => 0
            ],
            'sender_type' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'default' => null
            ],
            'notify_type' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'default' => null
            ],
            'created_at datetime default current_timestamp',
        ]);
        
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('sender_id', 'users', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->addForeignKey('receiver_id', 'users', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->createTable('notifications');
    }

    public function down() {
        $this->forge->dropTable('notifications');
    }

}
