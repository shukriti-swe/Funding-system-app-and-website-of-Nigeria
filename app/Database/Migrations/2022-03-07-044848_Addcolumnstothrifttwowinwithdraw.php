<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddcolumnstothrifttwowinwithdrawNew extends Migration
{
    public function up()
    {
        if (!$this->db->fieldExists('bank_code', 'thrift_two_win_withdraw')){
            $fields = [
                'bank_code' => [                
                    'type' => 'VARCHAR',
                    'constraint'=>'50',
                ],
                'bank_name' => [                
                    'type' => 'VARCHAR',
                    'constraint'=>'100',
                ],
                'account_number' => [                
                    'type' => 'INT',
                    'constraint'=>'10',
                ],
                'beneficiary' => [                
                    'type' => 'Varchar',
                    'constraint'=>'100',
                ]
            ];
            $this->forge->addColumn('thrift_two_win_withdraw', $fields);
        }
    }

    public function down()
    {
        $this->forge->dropColumn('thrift_two_win_withdraw', ['bank_code'],['account_number'],['beneficiary']);
    }
}
