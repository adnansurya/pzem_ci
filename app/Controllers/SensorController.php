<?php

namespace App\Controllers;

use App\Models\SensorModel;
use CodeIgniter\Controller;

class SensorController extends Controller
{
    public function index()
    {
        $sensorModel = new SensorModel();
        $data['sensorData'] = $sensorModel->orderBy('created_at', 'DESC')->findAll();

        return view('dashboard', $data);
    }

    public function history()
    {
        $sensorModel = new SensorModel();
        $data['sensorData'] = $sensorModel->orderBy('created_at', 'DESC')->findAll();

        return view('history', $data);
    }

    public function saveData()
    {
        $sensorModel = new SensorModel();

        $data = [
            'phase' => $this->request->getPost('phase'),
            'current' => $this->request->getPost('current'),
            'voltage' => $this->request->getPost('voltage'),
            'frequency' => $this->request->getPost('frequency'),
            'power' => $this->request->getPost('power'),
            'status' => $this->request->getPost('status'), // Tambahkan status
        ];

        $sensorModel->insert($data);

        return $this->response->setJSON(['status' => 'success']);
    }
}
