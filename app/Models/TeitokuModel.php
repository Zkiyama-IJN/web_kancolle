<?php

namespace App\Models;

use CodeIgniter\Model;

class TeitokuModel extends Model
{
    protected $table         = 'teitoku';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = [
        'nama_ingame',
        'server_id',
        'hq_level',
        'pesan_profil',
        'waifu_id',
        'status',
    ];

    protected $useTimestamps = true; // otomatis isi created_at & updated_at

    protected $validationRules = [
        'nama_ingame' => 'required|min_length[2]|max_length[100]',
        'server_id'   => 'required|integer',
        'hq_level'    => 'permit_empty|integer|greater_than[0]',
        'status'      => 'permit_empty|in_list[pending,approved,rejected]',
    ];

    public function getApproved(int $limit = 4): array
    {
        return $this->where('status', 'approved')
                    ->orderBy('updated_at', 'DESC')
                    ->findAll($limit);
    }

    public function getPending(): array
    {
        return $this->where('status', 'pending')
                    ->orderBy('created_at', 'ASC')
                    ->findAll();
    }

    /**
     * Dipakai dashboard admin - sertakan nama_server lewat join,
     * karena tabel teitoku hanya menyimpan server_id.
     */
    public function getPendingWithServer(): array
    {
        return $this->select('teitoku.*, server_kancolle.nama_server')
                    ->join('server_kancolle', 'server_kancolle.id = teitoku.server_id', 'left')
                    ->where('teitoku.status', 'pending')
                    ->orderBy('teitoku.created_at', 'ASC')
                    ->findAll();
    }

    public function countByStatus(string $status): int
    {
        return $this->where('status', $status)->countAllResults();
    }

        /**
     * Dipakai halaman publik Hall of Fame - gabung server & data FCM,
     * mendukung filter server/nama/minimal FCM sesuai PRD 2.1.
     */
    public function searchApproved(array $filters = []): array
    {
        $builder = $this->select('teitoku.*, server_kancolle.nama_server, pencapaian_hof.jumlah_fcm, pencapaian_hof.event_terakhir_hard')
                         ->join('server_kancolle', 'server_kancolle.id = teitoku.server_id', 'left')
                         ->join('pencapaian_hof', 'pencapaian_hof.teitoku_id = teitoku.id', 'left')
                         ->where('teitoku.status', 'approved');

        if (! empty($filters['server_id'])) {
            $builder->where('teitoku.server_id', (int) $filters['server_id']);
        }

        if (! empty($filters['nama'])) {
            $builder->like('teitoku.nama_ingame', $filters['nama']);
        }

        if (! empty($filters['min_fcm'])) {
            $builder->where('pencapaian_hof.jumlah_fcm >=', (int) $filters['min_fcm']);
        }

        return $builder->orderBy('pencapaian_hof.jumlah_fcm', 'DESC')->findAll();
    }

    /**
     * Detail satu profil approved untuk halaman detail HoF.
     */
    public function findApprovedById(int $id): ?array
    {
        return $this->select('teitoku.*, server_kancolle.nama_server, pencapaian_hof.jumlah_fcm, pencapaian_hof.event_terakhir_hard, pencapaian_hof.file_bukti_url, pencapaian_hof.tanggal_verifikasi')
                    ->join('server_kancolle', 'server_kancolle.id = teitoku.server_id', 'left')
                    ->join('pencapaian_hof', 'pencapaian_hof.teitoku_id = teitoku.id', 'left')
                    ->where('teitoku.id', $id)
                    ->where('teitoku.status', 'approved')
                    ->first();
    }
}