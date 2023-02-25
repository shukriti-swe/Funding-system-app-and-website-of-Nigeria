<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Changetypeaccountnumberthrifttwowinuserbvn extends Migration
{
    public function up()
    {
        $fields = [
            'account_number' => [                
                'type' => 'VARCHAR',
                'constraint'=>'50',
            ],
        ];
        $this->forge->modifyColumn('thrift_two_win_user_bvn', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('thrift_two_win_user_bvn',['account_number']);
    }
}
