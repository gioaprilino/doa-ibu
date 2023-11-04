<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_comment'    => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_postingan'   => [
                'type'  => 'INT',
                'unsigned'       => true,
            ],
            'id_user'   => [
                'type'  => 'INT',
                'unsigned'       => true,
            ],
            'comment'   => [
                'type'      => 'text',
            ],
            'file'   => [
                'type'      => 'text',
                'null'  => true
            ],
            'created_at'    => [
                'type'  => 'datetime',
                'null'  => true
            ],
            'updated_at'    => [
                'type'  => 'datetime',
                'null'  => true
            ],
        ]);
        $this->forge->addKey('id_comment', true);
        // $this->forge->addForeignKey('id_postingan', 'postingan', 'id_postingan', 'NO ACTION', 'CASCADE');
        // $this->forge->addForeignKey('id_user', 'users', 'id_user', 'NO ACTION', 'CASCADE');
        $this->forge->createTable('comments');
    }

    public function down()
    {
        //
    }
}
