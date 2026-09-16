<?php

namespace App\Controllers;

use App\Models\HonorRollModel;
use App\Models\TeitokuModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        $teitokuModel   = new TeitokuModel();
        $honorRollModel = new HonorRollModel();

        $data = [
            'title'           => 'Dashboard Admin — Chinjufu Archive',
            'pageTitle'       => 'Dashboard & Verifikasi',
            'pendingList'     => $teitokuModel->getPendingWithServer(),
            'jumlahPending'   => $teitokuModel->countByStatus('pending'),
            'jumlahApproved'  => $teitokuModel->countByStatus('approved'),
            'jumlahHonorRoll' => $honorRollModel->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }

    public function approve(int $id)
    {
        $teitokuModel = new TeitokuModel();

        if (! $teitokuModel->find($id)) {
            return redirect()->to('admin/dashboard')->with('error', 'Data pengajuan tidak ditemukan.');
        }

        $teitokuModel->update($id, ['status' => 'approved']);

        return redirect()->to('admin/dashboard')->with('success', 'Profil berhasil disetujui.');
    }

    public function reject(int $id)
    {
        $teitokuModel = new TeitokuModel();

        if (! $teitokuModel->find($id)) {
            return redirect()->to('admin/dashboard')->with('error', 'Data pengajuan tidak ditemukan.');
        }

        $teitokuModel->update($id, ['status' => 'rejected']);

        return redirect()->to('admin/dashboard')->with('success', 'Profil telah ditolak.');
    }
}