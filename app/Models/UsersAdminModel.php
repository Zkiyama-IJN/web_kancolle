<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersAdminModel extends Model
{
    protected $table         = 'users_admin';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['username', 'password_hash'];

    protected $useTimestamps = false; // hanya created_at, diisi manual saat seeding

    public function findByUsername(string $username): ?array
    {
        return $this->where('username', $username)->first();
    }
}