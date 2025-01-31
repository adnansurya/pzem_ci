<?php

namespace App\Models;

use CodeIgniter\Model;

class PzemModel extends Model
{
    protected $table = 'sensor_data';
    protected $primaryKey = 'id';

    public function getLatestData()
    {
        return $this->select('id, phase, current, voltage, frequency, power, pf, energy, status, created_at')
            ->orderBy('id', 'DESC')
            ->groupBy('phase')
            ->findAll();
    }

    public function getLatestDataByPhase()
    {
        return $this->db->query("
            SELECT * FROM sensor_data AS p1
            WHERE created_at = (
                SELECT MAX(created_at) FROM sensor_data AS p2 
                WHERE p1.phase = p2.phase
            )
            ORDER BY phase ASC;
        ")->getResultArray();
    }
}


