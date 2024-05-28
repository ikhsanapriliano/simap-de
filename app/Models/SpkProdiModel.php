<?php

namespace App\Models;

use CodeIgniter\Model;

class SpkProdiModel extends Model
{
    protected $table='spk_prodi';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'prodi',
        'pekerjaan_id'
    ];

    protected $useTimestamps = true;
}




