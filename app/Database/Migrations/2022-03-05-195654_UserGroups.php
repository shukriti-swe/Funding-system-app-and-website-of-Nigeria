<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserGroups extends Migration {

    public function up() {

        $this->forge->addField([
            'id' => [
                'type' => 'bigint',
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => '11'
            ],
            'group_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => '11'
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        
        $this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->addForeignKey('group_id', 'groups', 'id', 'NO ACTION', 'NO ACTION');
        
        $this->forge->createTable('users_groups');
    }

    public function down() {

        $this->forge->dropTable('users_groups');
    }

}
