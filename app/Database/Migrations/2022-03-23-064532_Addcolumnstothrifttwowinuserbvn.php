<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcolumnstothrifttwowinuserbvn extends Migration
{
    public function up()
    {
        $fields = [
            'status' => [                
                'type' => 'INT',
                'constraint' => 11,
                'default'=>'0',
            ]
        ];
        $this->forge->addColumn('thrift_two_win_user_bvn', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('thrift_two_win_user_bvn', ['status']);
    }
}
