<?php

namespace App\Models;

use CodeIgniter\Model;

class SensorModel extends Model
{
    protected $table = 'sensor_data';
    protected $primaryKey = 'id';
    protected $allowedFields = ['phase', 'current', 'voltage', 'frequency', 'power', 'status', 'created_at'];

}
