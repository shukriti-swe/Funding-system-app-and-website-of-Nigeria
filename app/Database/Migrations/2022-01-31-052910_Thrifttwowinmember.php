<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Thrifttwowinmember extends Migration
{

    public function up()
    {
        
        if (!$this->db->tableExists('thrift_two_win_member')) {
            $this->forge->addField(
            [
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'thrift_group_id'  => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'thrift_group_member_id'  => [
                'type'           => 'INT',
                'unsigned'           => true,
                'constraint'        =>'11'
            ],
            'thrift_group_member_join_date'  => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'thrift_group_member_number'  => [
                'type'           => 'INT',
                'constraint'     => 11
            ],  
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('thrift_group_member_id', 'users', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->addForeignKey('thrift_group_id', 'thrift_two_win', 'id', 'NO ACTION', 'NO ACTION');
        $this->forge->createTable('thrift_two_win_member');
        }
        
        
    }
    public function down()
    {
        $this->forge->dropTable('thrift_two_win_member'); 
    }
}
