<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateInvitedMember extends Migration {

    public function up() {

        $fields = [
            'status' => [                
                'type' => 'INT',
                'constraint'=>'1',
                'DEFAULT' =>0
            ]
        ];
        $this->forge->addColumn('thrift_two_win_invited_member', $fields);
    }

    public function down() {
        $this->forge->dropColumn('thrift_two_win_invited_member', ['status']);
    }

}