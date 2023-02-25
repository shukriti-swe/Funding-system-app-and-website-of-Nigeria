<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addinvitedatecolumtoinvite extends Migration
{
    public function up()
    {
        $fields = [
            'invited_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ];
        $this->forge->addColumn('thrift_two_win_invited_member', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('thrift_two_win_invited_member', ['invited_date']);
    }
}
