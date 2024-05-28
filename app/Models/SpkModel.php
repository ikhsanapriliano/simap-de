<?php

namespace App\Models;

use CodeIgniter\Model;

class SpkModel extends Model
{
    protected $table='spk';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'no_registrasi',
        'keluar',
        'terima',
        'Pemesan',
        'deadline',
        'pic',
    ];

    protected $useTimestamps = true;
}