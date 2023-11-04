<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Postingan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_postingan'    => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user'   => [
                'type'  => 'INT',
                'unsigned'       => true,
            ],
            'judul'   => [
                'type'      => 'text',
            ],
            'postingan'   => [
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
        $this->forge->addKey('id_postingan', true);
        // $this->forge->addForeignKey('id_user', 'users', 'id_user', 'NO ACTION', 'CASCADE');
        $this->forge->createTable('postingan');
    }

    public function down()
    {
        //
    }
}
