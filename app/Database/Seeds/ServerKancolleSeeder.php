<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServerKancolleSeeder extends Seeder
{
    public function run()
    {
        $servers = ['Yokosuka', 'Kure', 'Sasebo', 'Maizuru', 'Ominato'];

        $data = array_map(static fn ($nama) => [
            'nama_server' => $nama,
            'created_at'  => date('Y-m-d H:i:s'),
        ], $servers);

        $this->db->table('server_kancolle')->insertBatch($data);
    }
}