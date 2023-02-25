<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttowinsetting extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,                    
                'auto_increment' => true,
            ],
            'setting_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'setting_value' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        
        $this->forge->createTable('settings');
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
