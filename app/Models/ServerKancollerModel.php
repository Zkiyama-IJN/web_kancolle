<?php

namespace App\Models;

use CodeIgniter\Model;

class ServerKancolleModel extends Model
{
    protected $table         = 'server_kancolle';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['nama_server'];
    protected $useTimestamps = false;
}