<?php

namespace App\Controllers;
use App\Models\PzemModel;
use CodeIgniter\I18n\Time;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }

    public function getLatestData()
    {
        $pzemModel = new PzemModel();
        $data = $pzemModel->getLatestDataByPhase();

        // Ubah format waktu sebelum dikirim ke view
        foreach ($data as &$row) {
            $row['created_at'] = Time::parse($row['created_at'])->toLocalizedString('dd MMM yyyy HH:mm:ss');
        }


        return $this->response->setJSON($data);
    }
}
