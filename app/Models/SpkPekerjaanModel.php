<?php

namespace App\Models;

use CodeIgniter\Model;

class SpkPekerjaanModel extends Model
{
    protected $table='spk_pekerjaan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'pekerjaan',
        'kategori',
        'status',
        'progress',
        'keterangan',
        'mulai',
        'selesai',
        'spk_id',
        'tracker'
    ];

    protected $useTimestamps = true;
}