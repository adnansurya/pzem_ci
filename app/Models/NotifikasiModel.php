<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table = 'notifikasi';
    protected $allowedFields = ['fase', 'pesan', 'created_at', 'is_read'];
    public $timestamps = true;
}
