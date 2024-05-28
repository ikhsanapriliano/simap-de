<?php

namespace App\Models;

use CodeIgniter\Model;

class SpkLampiranModel extends Model
{
    protected $table='spk_lampiran';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'lampiran',
        'spk_id'
    ];

    protected $useTimestamps = true;
}