<?php

namespace App\Controllers;

use App\Models\HonorRollModel;

class HonorRollController extends BaseController
{
    protected HonorRollModel $honorRollModel;

    public function __construct()
    {
        $this->honorRollModel = new HonorRollModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Roll of Honor — Admin',
            'pageTitle'     => 'Roll of Honor',
            'honorRollList' => $this->honorRollModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('admin/honor_roll_index', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Kontributor — Admin',
            'pageTitle' => 'Tambah Kontributor Roll of Honor',
        ];

        return view('admin/honor_roll_form', $data);
    }

    public function store()
    {
        if (! $this->honorRollModel->save($this->request->getPost())) {
            return redirect()->back()
                              ->withInput()
                              ->with('validation', $this->honorRollModel->errors());
        }

        return redirect()->to('admin/honor-roll')->with('success', 'Kontributor berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $item = $this->honorRollModel->find($id);

        if (! $item) {
            return redirect()->to('admin/honor-roll')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title'     => 'Edit Kontributor — Admin',
            'pageTitle' => 'Edit Kontributor Roll of Honor',
            'item'      => $item,
        ];

        return view('admin/honor_roll_form', $data);
    }

    public function update(int $id)
    {
        if (! $this->honorRollModel->find($id)) {
            return redirect()->to('admin/honor-roll')->with('error', 'Data tidak ditemukan.');
        }

        if (! $this->honorRollModel->update($id, $this->request->getPost())) {
            return redirect()->back()
                              ->withInput()
                              ->with('validation', $this->honorRollModel->errors());
        }

        return redirect()->to('admin/honor-roll')->with('success', 'Perubahan berhasil disimpan.');
    }

    public function delete(int $id)
    {
        if (! $this->honorRollModel->find($id)) {
            return redirect()->to('admin/honor-roll')->with('error', 'Data tidak ditemukan.');
        }

        $this->honorRollModel->delete($id);

        return redirect()->to('admin/honor-roll')->with('success', 'Kontributor berhasil dihapus.');
    }
}