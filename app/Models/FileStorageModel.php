<?php

namespace App\Models;

use CodeIgniter\Model;

class FileStorageModel extends Model
{
    protected $table='file_storage';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'no_registrasi',
        'pemesan',
        'pekerjaan',
        'file_pdf',
        'file_zip',
    ];

    protected $useTimestamps = true;
}