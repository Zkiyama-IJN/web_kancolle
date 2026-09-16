<?php

namespace App\Controllers;

use App\Models\ServerKancolleModel;
use App\Models\TeitokuModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class HallOfFameController extends BaseController
{
    public function index()
    {
        $teitokuModel = new TeitokuModel();
        $serverModel  = new ServerKancolleModel();

        $filters = [
            'server_id' => $this->request->getGet('server_id'),
            'nama'      => $this->request->getGet('nama'),
            'min_fcm'   => $this->request->getGet('min_fcm'),
        ];

        $data = [
            'title'       => 'Hall of Fame — Chinjufu Archive',
            'teitokuList' => $teitokuModel->searchApproved($filters),
            'serverList'  => $serverModel->findAll(),
            'filters'     => $filters,
        ];

        return view('pages/hall_of_fame', $data);
    }

    public function show(int $id)
    {
        $teitokuModel = new TeitokuModel();
        $teitoku      = $teitokuModel->findApprovedById($id);

        if (! $teitoku) {
            throw PageNotFoundException::forPageNotFound('Profil Teitoku tidak ditemukan.');
        }

        $data = [
            'title'   => $teitoku['nama_ingame'] . ' — Hall of Fame',
            'teitoku' => $teitoku,
        ];

        return view('pages/hall_of_fame_detail', $data);
    }
}