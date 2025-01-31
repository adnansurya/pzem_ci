<?php

namespace App\Controllers;

use App\Models\SensorModel;
use CodeIgniter\I18n\Time;

class History extends BaseController
{
    public function index()
    {
        $sensorModel = new SensorModel();
        $data['sensorHistory'] = $sensorModel->orderBy('created_at', 'DESC')->findAll();
        
        // Ubah format waktu sebelum dikirim ke view
        foreach ($data['sensorHistory'] as &$row) {
            $row['created_at'] = Time::parse($row['created_at'])->toLocalizedString('dd MMM yyyy HH:mm:ss');
        }

        return view('history', $data);
    }
}
