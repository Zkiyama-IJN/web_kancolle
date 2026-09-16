<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePencapaianHofTable extends Migration
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
            'teitoku_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'jumlah_fcm' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'default'    => 0,
                'comment'    => 'Jumlah First Class Medal',
            ],
            'event_terakhir_hard' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => true,
            ],
            'file_bukti_url' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'tanggal_verifikasi' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('teitoku_id');
        $this->forge->addForeignKey('teitoku_id', 'teitoku', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pencapaian_hof');
    }

    public function down()
    {
        $this->forge->dropTable('pencapaian_hof', true);
    }
}