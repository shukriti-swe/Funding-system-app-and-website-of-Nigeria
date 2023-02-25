<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addrecipientidtothrifttwowinbankaccount extends Migration
{
    public function up()
    {
        $fields = [
            'recipient_id' => [                
                'type' => 'VARCHAR',
                'constraint'=>'50',
            ],
        ];
        $this->forge->addColumn('thrift_two_win_bank_account', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('thrift_two_win_bank_account', ['recipient_id']);
    }
}
