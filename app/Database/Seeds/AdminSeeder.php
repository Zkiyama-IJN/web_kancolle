<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * PERINGATAN: password default di bawah HANYA untuk development lokal.
     * Ganti segera lewat query manual atau fitur ubah password begitu
     * fitur auth (Fase 2) selesai. Jangan pernah pakai default ini di server produksi.
     */
    public function run()
    {
        $data = [
            'username'      => 'admin',
            'password_hash' => password_hash('ChinjufuAdmin!2026', PASSWORD_DEFAULT),
            'created_at'    => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users_admin')->insert($data);
    }
}