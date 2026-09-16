<?php

namespace App\Controllers;

use App\Models\HonorRollModel;

class RollOfHonorController extends BaseController
{
    public function index()
    {
        $honorRollModel = new HonorRollModel();
        $kategoriAktif  = $this->request->getGet('kategori');

        $data = [
            'title'         => 'Roll of Honor — Chinjufu Archive',
            'honorRollList' => $honorRollModel->searchByCategory($kategoriAktif),
            'kategoriAktif' => $kategoriAktif,
            'kategoriList'  => ['Penerjemah', 'Guide Creator', 'Artist', 'Event Organizer', 'Lainnya'],
        ];

        return view('pages/roll_of_honor', $data);
    }
}