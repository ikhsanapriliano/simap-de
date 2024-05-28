<?php

namespace App\Models;

use CodeIgniter\Model;

class SpkHelperModel extends Model
{
    protected $table='spk_helper';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'worker_id',
        'pekerjaan_id'
    ];

    protected $useTimestamps = true;
}




