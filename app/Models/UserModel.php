<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nip', 
        'nama', 
        'user_level',
        'username',
        'password',
        'email',
        'no_telepon',
        'photo'
    ];

    protected $useTimestamps = true;
}