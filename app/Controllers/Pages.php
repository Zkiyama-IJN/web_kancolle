<?php

namespace App\Controllers;

class Pages extends BaseController
{
    /**
     * Dashboard / Beranda.
     * TODO Fase 2: ganti dummy array di bawah dengan query ke model
     * TeitokuModel (hofHighlights) & HonorRollModel (rohHighlights).
     */
    public function index()
    {
        $data = [
            'title' => 'Chinjufu Archive — Beranda',
            'hofHighlights' => [
                ['id' => 1, 'nama' => 'Admiral Hayate',  'role' => 'FCM Collector', 'tahun' => '2023–2026', 'photo' => 'https://placehold.co/300x400/13203a/D4AF37?text=1'],
                ['id' => 2, 'nama' => 'Teitoku Ryuusei',  'role' => 'Event Cleaner', 'tahun' => '2022–2026', 'photo' => 'https://placehold.co/300x400/13203a/D4AF37?text=2'],
                ['id' => 3, 'nama' => 'Admiral Shiori',   'role' => 'Ring Collector','tahun' => '2024–2026', 'photo' => 'https://placehold.co/300x400/13203a/D4AF37?text=3'],
                ['id' => 4, 'nama' => 'Teitoku Kaguya',   'role' => 'Hard Clearer',  'tahun' => '2021–2026', 'photo' => 'https://placehold.co/300x400/13203a/D4AF37?text=4'],
            ],
            'rohHighlights' => [
                ['nama' => 'Naotora',     'kategori' => 'Penerjemah',       'tanggal' => '10 Sep', 'avatar' => 'https://placehold.co/48x48/111A2C/94A3B8?text=N'],
                ['nama' => 'Kuroshio_ID', 'kategori' => 'Guide Creator',    'tanggal' => '08 Sep', 'avatar' => 'https://placehold.co/48x48/111A2C/94A3B8?text=K'],
                ['nama' => 'Fumizuki92',  'kategori' => 'Artist',           'tanggal' => '03 Sep', 'avatar' => 'https://placehold.co/48x48/111A2C/94A3B8?text=F'],
                ['nama' => 'Admiral Rei', 'kategori' => 'Event Organizer',  'tanggal' => '29 Agu', 'avatar' => 'https://placehold.co/48x48/111A2C/94A3B8?text=R'],
            ],
        ];

        return view('pages/dashboard', $data);
    }
}
