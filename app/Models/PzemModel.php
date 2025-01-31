<?php

namespace App\Models;

use CodeIgniter\Model;

class PzemModel extends Model
{
    protected $table = 'sensor_data';
    protected $primaryKey = 'id';

    public function getLatestData()
    {
        return $this->select('phase, current, voltage, frequency, power, pf, energy, status, created_at')
                    ->orderBy('created_at', 'DESC')
                    ->groupBy('phase')
                    ->findAll();
    }
}
