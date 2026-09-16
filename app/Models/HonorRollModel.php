<?php

namespace App\Models;

use CodeIgniter\Model;

class HonorRollModel extends Model
{
    protected $table         = 'honor_roll';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = [
        'nama_kontributor',
        'kategori_kontribusi',
        'deskripsi',
        'link_referensi',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // tabel ini tidak punya kolom updated_at

    protected $validationRules = [
        'nama_kontributor'    => 'required|min_length[2]|max_length[100]',
        'kategori_kontribusi' => 'required|max_length[50]',
    ];

    public function getLatest(int $limit = 4): array
    {
        return $this->orderBy('created_at', 'DESC')->findAll($limit);
    }

        /**
     * Dipakai halaman publik Roll of Honor - filter opsional per kategori.
     */
    public function searchByCategory(?string $kategori = null): array
    {
        if (! empty($kategori)) {
            $this->where('kategori_kontribusi', $kategori);
        }

        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}