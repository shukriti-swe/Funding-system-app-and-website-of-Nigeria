<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addpaycustomeridcolumntouser extends Migration
{
    public function up()
    {
        $fields = [
            'pay_customer_id' => [                
                'type' => 'VARCHAR',
                'constraint'=>'50',
                'default'=>'',
            ]
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['pay_customer_id']);
    }
}
