<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table='notification';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'type',
        'message',
        'status'
    ];

    protected $useTimestamps = true;
}