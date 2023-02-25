<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcolumnstothrifttwowinwithdraw extends Migration
{
    public function up()
    {
        $fields = [
            'status_details' => [                
                'type' => 'TEXT',
                'default'=>'',
            ]
        ];
        $this->forge->addColumn('thrift_two_win_withdraw', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('thrift_two_win_withdraw', ['status_details']);
    }
}
