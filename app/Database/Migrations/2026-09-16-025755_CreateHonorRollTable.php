<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHonorRollTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kontributor' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'kategori_kontribusi' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'comment'    => 'Penerjemah, Guide Creator, Artist, Event Organizer, dll',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'link_referensi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('honor_roll');
    }

    public function down()
    {
        $this->forge->dropTable('honor_roll', true);
    }
}