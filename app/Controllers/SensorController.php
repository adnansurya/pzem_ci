<?php

namespace App\Controllers;

use App\Models\SensorModel;
use \App\Models\NotifikasiModel;
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
        $request = $this->request;

        $sensorModel = new SensorModel();
        $notifModel  = new NotifikasiModel();

        $fase   = $request->getPost('phase');
        $status = $request->getPost('status');

        $dataBaru = [
            'phase' => $fase,
            'current' => $request->getPost('current'),
            'voltage' => $request->getPost('voltage'),
            'frequency' => $request->getPost('frequency'),
            'power' => $request->getPost('power'),
            'pf' => $request->getPost('pf'),
            'energy' => $request->getPost('energy'),
            'status' => $status, // Tambahkan status
        ];

        // Ambil satu data terakhir (tanpa filter fase)
        $dataLama = $sensorModel->orderBy('id', 'DESC')->first();

        // Simpan data baru
        $sensorModel->insert($dataBaru);

        // Jika status berubah, buat notifikasi
        if ($dataLama && $dataLama['status'] !== $status) {

            $pesan = '-';

            if ($status == 'Disconnected') {
                $pesan = "Sirkuit Terputus";
            } else {
                $pesan = "Status berubah dari {$dataLama['status']} ke {$status}";
            }

            $notifModel->insert([
                'fase'      => $fase,
                'pesan'     => $pesan
            ]);
        }

        return $this->response->setJSON(['status' => 'success']);
    }
}
