<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SupportMessage extends Migration {

    public function up() {

        $this->forge->addField([
            'id' => [
                'type' => 'bigint',
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'bigint',
                'null' => false,
            ],
            'receiver_id' => [
                'type' => 'bigint',
                'null' => false,
            ],
            'ticket_id' => [
                'type' => 'bigint',
                'null' => false,
            ],
            'message' => [
                'type' => 'text',
                'constraint' => '512',
                'null' => false,
            ],
            'attachment' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('support_message');
    }

    public function down() {
        
        $this->forge->dropTable('support_message');
    }

}
