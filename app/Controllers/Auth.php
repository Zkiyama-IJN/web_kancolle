<?php

namespace App\Controllers;

use App\Models\UsersAdminModel;

class Auth extends BaseController
{
    /**
     * Tampilkan form login admin.
     */
    public function login()
    {
        if (session()->get('isAdminLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        $data = [
            'title' => 'Login Admin — Chinjufu Archive',
        ];

        return view('pages/login', $data);
    }

    /**
     * Proses autentikasi. Dipanggil dari form login (POST).
     */
    public function attemptLogin()
    {
        $rules = [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                              ->withInput()
                              ->with('error', 'Username dan password wajib diisi dengan benar.');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $usersAdminModel = new UsersAdminModel();
        $admin            = $usersAdminModel->findByUsername($username);

        if (! $admin || ! password_verify($password, $admin['password_hash'])) {
            return redirect()->back()
                              ->withInput()
                              ->with('error', 'Username atau password salah.');
        }

        session()->regenerate();

        session()->set([
            'isAdminLoggedIn' => true,
            'adminId'         => $admin['id'],
            'adminUsername'   => $admin['username'],
        ]);

        return redirect()->to('/admin/dashboard');
    }

    /**
     * Logout, hapus session, kembali ke halaman login.
     */
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/admin/login')
                          ->with('success', 'Berhasil logout.');
    }
}