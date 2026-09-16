<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServerKancolleTable extends Migration
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
            'nama_server' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('nama_server');
        $this->forge->createTable('server_kancolle');
    }

    public function down()
    {
        $this->forge->dropTable('server_kancolle', true);
    }
}