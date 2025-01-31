<?php

namespace App\Models;

use CodeIgniter\Model;

class SensorModel extends Model
{
    protected $table = 'sensor_data';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','phase', 'current', 'voltage', 'frequency', 'power', 'pf', 'energy', 'status', 'created_at'];
}
