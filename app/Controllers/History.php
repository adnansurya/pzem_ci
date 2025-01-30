<?php

namespace App\Controllers;
use App\Models\SensorModel;

class History extends BaseController
{
    public function index()
    {
        $sensorModel = new SensorModel();
        $data['sensorHistory'] = $sensorModel->orderBy('created_at', 'DESC')->findAll();

        return view('history', $data);
    }
}
