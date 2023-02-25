<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addreferredbycolumntouser extends Migration
{
    public function up()
    {
        $fields = [
            'referred_by' => [                
                'type' => 'INT',
                'constraint'=>'11',
                'DEFAULT' =>0
            ]
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['referred_by']);
    }
}
