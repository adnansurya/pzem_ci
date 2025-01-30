<?php

namespace App\Controllers;
use App\Models\PzemModel;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }

    public function getLatestData()
    {
        $pzemModel = new PzemModel();
        $data = $pzemModel->getLatestData();

        return $this->response->setJSON($data);
    }
}
