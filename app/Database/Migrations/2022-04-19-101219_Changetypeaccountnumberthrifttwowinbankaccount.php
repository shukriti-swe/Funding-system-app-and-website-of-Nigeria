<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Changetypeaccountnumberthrifttwowinbankaccount extends Migration
{
    public function up()
    {
        $fields = [
            'account_number' => [                
                'type' => 'VARCHAR',
                'constraint'=>'50',
            ],
        ];
        $this->forge->modifyColumn('thrift_two_win_bank_account', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('thrift_two_win_bank_account',['account_number']);
    }
}
