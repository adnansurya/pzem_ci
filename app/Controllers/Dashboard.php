<?php

namespace App\Controllers;

use App\Models\PzemModel;
use App\Models\NotifikasiModel;
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

    public function cekNotifikasiBaru()
    {
        $notifModel = new NotifikasiModel();
        $notif = $notifModel->where('is_read', 0)
            ->orderBy('id', 'DESC')
            ->first();

        if ($notif) {
            // Tandai sebagai sudah dibaca
            $notifModel->update($notif['id'], ['is_read' => 1]);

            return $this->response->setJSON([
                'success' => true,
                'pesan'   => $notif['pesan']
            ]);
        }

        return $this->response->setJSON(['success' => false]);
    }

    public function getNotifikasiTerbaru()
    {
        $notifModel = new NotifikasiModel();

        $notifs = $notifModel->orderBy('created_at', 'DESC')
            ->limit(3)
            ->findAll();

        return $this->response->setJSON($notifs);
    }
}
