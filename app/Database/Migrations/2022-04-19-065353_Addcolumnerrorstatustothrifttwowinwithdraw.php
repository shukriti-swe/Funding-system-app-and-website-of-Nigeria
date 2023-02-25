<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addcolumnerrorstatustothrifttwowinwithdraw extends Migration
{
    public function up()
    {
        $fields = [
            'error_status' => [                
                'type' => 'TEXT',
            ]
        ];
        $this->forge->addColumn('thrift_two_win_withdraw', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('thrift_two_win_withdraw', ['error_status']);
    }
}
