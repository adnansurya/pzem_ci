namespace App\Controllers;
use App\Models\SensorModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $sensorModel = new SensorModel();
        $data['sensorData'] = $sensorModel->orderBy('created_at', 'DESC')->findAll();

        return view('dashboard', $data);
    }
}
