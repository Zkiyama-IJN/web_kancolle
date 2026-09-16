<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTeitokuTable extends Migration
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
            'nama_ingame' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'server_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'hq_level' => [
                'type'       => 'SMALLINT',
                'constraint' => 5,
                'unsigned'   => true,
                'null'       => true,
            ],
            'pesan_profil' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'waifu_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'comment'    => 'Nama kapal favorit, disimpan sebagai string bebas',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'default'    => 'pending',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('server_id');
        $this->forge->addKey('status');
        $this->forge->addForeignKey('server_id', 'server_kancolle', 'id', 'RESTRICT', 'CASCADE');
        $this->forge->createTable('teitoku');
    }

    public function down()
    {
        $this->forge->dropTable('teitoku', true);
    }
}