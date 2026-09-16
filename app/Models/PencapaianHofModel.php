<?php

namespace App\Models;

use CodeIgniter\Model;

class PencapaianHofModel extends Model
{
    protected $table         = 'pencapaian_hof';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = [
        'teitoku_id',
        'jumlah_fcm',
        'event_terakhir_hard',
        'file_bukti_url',
        'tanggal_verifikasi',
    ];

    protected $useTimestamps = false;

    public function getWithTeitoku(int $limit = 4): array
    {
        return $this->select('pencapaian_hof.*, teitoku.nama_ingame, teitoku.waifu_id')
                    ->join('teitoku', 'teitoku.id = pencapaian_hof.teitoku_id')
                    ->where('teitoku.status', 'approved')
                    ->orderBy('pencapaian_hof.jumlah_fcm', 'DESC')
                    ->findAll($limit);
    }
}