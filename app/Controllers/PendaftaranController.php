<?php

namespace App\Controllers;

use App\Models\PencapaianHofModel;
use App\Models\ServerKancolleModel;
use App\Models\TeitokuModel;

class PendaftaranController extends BaseController
{
    public function index()
    {
        $serverModel = new ServerKancolleModel();

        $data = [
            'title'      => 'Ajukan Profil Teitoku — Chinjufu Archive',
            'serverList' => $serverModel->findAll(),
        ];

        return view('pages/daftar', $data);
    }

    public function store()
    {
        $rules = [
            'nama_ingame' => 'required|min_length[2]|max_length[100]',
            'server_id'   => 'required|integer|is_not_unique[server_kancolle.id]',
            'hq_level'    => 'permit_empty|integer|greater_than[0]',
            'waifu_id'    => 'permit_empty|max_length[100]',
            'pesan_profil'=> 'permit_empty|max_length[500]',
            'jumlah_fcm'  => 'permit_empty|integer|greater_than_equal_to[0]',
            'event_terakhir_hard' => 'permit_empty|max_length[150]',
            'screenshot'  => [
                'label' => 'Screenshot bukti',
                'rules' => 'uploaded[screenshot]|max_size[screenshot,2048]|is_image[screenshot]|mime_in[screenshot,image/jpg,image/jpeg,image/png]',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                              ->withInput()
                              ->with('validation', $this->validator->getErrors());
        }

        $teitokuModel      = new TeitokuModel();
        $pencapaianHofModel = new PencapaianHofModel();

        $teitokuId = $teitokuModel->insert([
            'nama_ingame'  => $this->request->getPost('nama_ingame'),
            'server_id'    => $this->request->getPost('server_id'),
            'hq_level'     => $this->request->getPost('hq_level') ?: null,
            'waifu_id'     => $this->request->getPost('waifu_id'),
            'pesan_profil' => $this->request->getPost('pesan_profil'),
        ]);

        if (! $teitokuId) {
            return redirect()->back()
                              ->withInput()
                              ->with('error', 'Gagal menyimpan profil. Silakan coba lagi.');
        }

        $file = $this->request->getFile('screenshot');
        $fileUrl = null;

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $safeNama = url_title($this->request->getPost('nama_ingame'), '_', true);
            $newName  = 'hof_' . $safeNama . '_' . time() . '.' . $file->getExtension();

            $file->move(FCPATH . 'uploads/screenshots', $newName);
            $fileUrl = 'uploads/screenshots/' . $newName;
        }

        $pencapaianHofModel->insert([
            'teitoku_id'          => $teitokuId,
            'jumlah_fcm'          => $this->request->getPost('jumlah_fcm') ?: 0,
            'event_terakhir_hard' => $this->request->getPost('event_terakhir_hard'),
            'file_bukti_url'      => $fileUrl,
        ]);

        return redirect()->to('daftar/sukses')->with('namaPengaju', $this->request->getPost('nama_ingame'));
    }

    public function sukses()
    {
        return view('pages/daftar_sukses', [
            'title'       => 'Pengajuan Terkirim — Chinjufu Archive',
            'namaPengaju' => session()->getFlashdata('namaPengaju'),
        ]);
    }
}