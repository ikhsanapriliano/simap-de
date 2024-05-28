<?php

namespace App\Controllers;

use App\Models\SpkModel;
use App\Models\SpkPekerjaanModel;
use App\Models\UserModel;
use DateTime;

class Dashboard extends BaseController
{
    private $userModel;
    private $spkModel;
    private $spkPekerjaanModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->spkModel = new SpkModel();
        $this->spkPekerjaanModel = new SpkPekerjaanModel();
    }

    public function index()
    {
        $userData = service('request')->userData;
        $user = $this->userModel->find($userData['user_id']);
        $userData['user_photo'] = $user['photo'];

        $bidding = count($this->spkPekerjaanModel->where('tracker', 'bidd')->findAll());
        $order = count($this->spkPekerjaanModel->where('tracker', 'order')->findAll());
        $progress = count($this->spkPekerjaanModel->where([
            'tracker' => 'order',
            'status' => 'proses pengerjaan'
        ])->findAll());
        $done = count($this->spkPekerjaanModel->where([
            'tracker' => 'order',
            'status' => 'selesai'
        ])->findAll());

        $data = [
            'bidding' => $bidding,
            'order' => $order,
            'progress' => $progress,
            'done' => $done,
            'user_id' => $userData['user_id'],
            'user_level' => $userData['user_level'],
            'username' => $userData['username'],
            'user_photo' => $userData['user_photo'],
            'untoggled' => true
        ];

        return view('dashboard_view', $data);
    }

    public function getOrder()
    {
        $json = file_get_contents('php://input');
        $year = json_decode($json, true);

        $orders = $this->spkPekerjaanModel->like('created_at', $year['yearOrder'])->where('tracker', 'order')->findAll();
        
        $data = [
            'jan' => 0,
            'feb' => 0,
            'mar' => 0,
            'apr' => 0,
            'mei' => 0,
            'jun' => 0,
            'jul' => 0,
            'agu' => 0,
            'sep' => 0,
            'okt' => 0,
            'nov' => 0,
            'des' => 0,
        ];

        foreach ($orders as $order) {
            $month = explode('-', $order['created_at'])[1];

            switch ($month) {
                case '01':
                    $data['jan']++;
                    $data['feb']++;
                    $data['mar']++;
                    $data['apr']++;
                    $data['mei']++;
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '02':
                    $data['feb']++;
                    $data['mar']++;
                    $data['apr']++;
                    $data['mei']++;
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '03':
                    $data['mar']++;
                    $data['apr']++;
                    $data['mei']++;
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '04':
                    $data['apr']++;
                    $data['mei']++;
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '05':
                    $data['mei']++;
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '06':
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '07':
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '08':
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '09':
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '10':
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '11':
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '12':
                    $data['des']++;
                    break;
                default:
                    break;
            }

            $timeNow = new DateTime();
            $currentYear = $timeNow->format('Y');
            $currentMonth = $timeNow->format('m');
    
            if ($year['yearOrder'] == $currentYear) {
                switch ($currentMonth) {
                    case '01':
                        $data['feb'] = 0;
                        $data['mar'] = 0;
                        $data['apr'] = 0;
                        $data['mei'] = 0;
                        $data['jun'] = 0;
                        $data['jul'] = 0;
                        $data['agu'] = 0;
                        $data['sep'] = 0;
                        $data['okt'] = 0;
                        $data['nov'] = 0;
                        $data['des'] = 0;
                        break;
                    case '02':
                        $data['mar'] = 0;
                        $data['apr'] = 0;
                        $data['mei'] = 0;
                        $data['jun'] = 0;
                        $data['jul'] = 0;
                        $data['agu'] = 0;
                        $data['sep'] = 0;
                        $data['okt'] = 0;
                        $data['nov'] = 0;
                        $data['des'] = 0;
                        break;
                    case '03':
                        $data['apr'] = 0;
                        $data['mei'] = 0;
                        $data['jun'] = 0;
                        $data['jul'] = 0;
                        $data['agu'] = 0;
                        $data['sep'] = 0;
                        $data['okt'] = 0;
                        $data['nov'] = 0;
                        $data['des'] = 0;
                        break;
                    case '04':
                        $data['mei'] = 0;
                        $data['jun'] = 0;
                        $data['jul'] = 0;
                        $data['agu'] = 0;
                        $data['sep'] = 0;
                        $data['okt'] = 0;
                        $data['nov'] = 0;
                        $data['des'] = 0;
                        break;
                    case '05':
                        $data['jun'] = 0;
                        $data['jul'] = 0;
                        $data['agu'] = 0;
                        $data['sep'] = 0;
                        $data['okt'] = 0;
                        $data['nov'] = 0;
                        $data['des'] = 0;
                        break;
                    case '06':
                        $data['jul'] = 0;
                        $data['agu'] = 0;
                        $data['sep'] = 0;
                        $data['okt'] = 0;
                        $data['nov'] = 0;
                        $data['des'] = 0;
                        break;
                    case '07':
                        $data['agu'] = 0;
                        $data['sep'] = 0;
                        $data['okt'] = 0;
                        $data['nov'] = 0;
                        $data['des'] = 0;
                        break;
                    case '08':
                        $data['sep'] = 0;
                        $data['okt'] = 0;
                        $data['nov'] = 0;
                        $data['des'] = 0;
                        break;
                    case '09':
                        $data['okt'] = 0;
                        $data['nov'] = 0;
                        $data['des'] = 0;
                        break;
                    case '10':
                        $data['nov'] = 0;
                        $data['des'] = 0;
                        break;
                    case '11':
                        $data['des'] = 0;
                        break;
                    case '12':
                        $data['des'] = 0;
                        break;
                    default:
                        break;
                }
            }
        }

        return $this->response->setJSON($data);
    }

    public function getWorker()
    {
        $json = file_get_contents('php://input');
        $year = json_decode($json, true);

        $orders = $this->userModel->like([
            'created_at' => $year['yearOrder'],
            'user_level' => 'worker'
        ])->findAll();
        
        $data = [
            'jan' => 0,
            'feb' => 0,
            'mar' => 0,
            'apr' => 0,
            'mei' => 0,
            'jun' => 0,
            'jul' => 0,
            'agu' => 0,
            'sep' => 0,
            'okt' => 0,
            'nov' => 0,
            'des' => 0,
        ];

        foreach ($orders as $order) {
            $month = explode('-', $order['created_at'])[1];
            

            switch ($month) {
                case '01':
                    $data['jan']++;
                    $data['feb']++;
                    $data['mar']++;
                    $data['apr']++;
                    $data['mei']++;
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '02':
                    $data['feb']++;
                    $data['mar']++;
                    $data['apr']++;
                    $data['mei']++;
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '03':
                    $data['mar']++;
                    $data['apr']++;
                    $data['mei']++;
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '04':
                    $data['apr']++;
                    $data['mei']++;
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '05':
                    $data['mei']++;
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '06':
                    $data['jun']++;
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '07':
                    $data['jul']++;
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '08':
                    $data['agu']++;
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '09':
                    $data['sep']++;
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '10':
                    $data['okt']++;
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '11':
                    $data['nov']++;
                    $data['des']++;
                    break;
                case '12':
                    $data['des']++;
                    break;
                default:
                    break;
            }
        }

        $timeNow = new DateTime();
        $currentYear = $timeNow->format('Y');
        $currentMonth = $timeNow->format('m');

        if ($year['yearOrder'] == $currentYear) {
            switch ($currentMonth) {
                case '01':
                    $data['feb'] = 0;
                    $data['mar'] = 0;
                    $data['apr'] = 0;
                    $data['mei'] = 0;
                    $data['jun'] = 0;
                    $data['jul'] = 0;
                    $data['agu'] = 0;
                    $data['sep'] = 0;
                    $data['okt'] = 0;
                    $data['nov'] = 0;
                    $data['des'] = 0;
                    break;
                case '02':
                    $data['mar'] = 0;
                    $data['apr'] = 0;
                    $data['mei'] = 0;
                    $data['jun'] = 0;
                    $data['jul'] = 0;
                    $data['agu'] = 0;
                    $data['sep'] = 0;
                    $data['okt'] = 0;
                    $data['nov'] = 0;
                    $data['des'] = 0;
                    break;
                case '03':
                    $data['apr'] = 0;
                    $data['mei'] = 0;
                    $data['jun'] = 0;
                    $data['jul'] = 0;
                    $data['agu'] = 0;
                    $data['sep'] = 0;
                    $data['okt'] = 0;
                    $data['nov'] = 0;
                    $data['des'] = 0;
                    break;
                case '04':
                    $data['mei'] = 0;
                    $data['jun'] = 0;
                    $data['jul'] = 0;
                    $data['agu'] = 0;
                    $data['sep'] = 0;
                    $data['okt'] = 0;
                    $data['nov'] = 0;
                    $data['des'] = 0;
                    break;
                case '05':
                    $data['jun'] = 0;
                    $data['jul'] = 0;
                    $data['agu'] = 0;
                    $data['sep'] = 0;
                    $data['okt'] = 0;
                    $data['nov'] = 0;
                    $data['des'] = 0;
                    break;
                case '06':
                    $data['jul'] = 0;
                    $data['agu'] = 0;
                    $data['sep'] = 0;
                    $data['okt'] = 0;
                    $data['nov'] = 0;
                    $data['des'] = 0;
                    break;
                case '07':
                    $data['agu'] = 0;
                    $data['sep'] = 0;
                    $data['okt'] = 0;
                    $data['nov'] = 0;
                    $data['des'] = 0;
                    break;
                case '08':
                    $data['sep'] = 0;
                    $data['okt'] = 0;
                    $data['nov'] = 0;
                    $data['des'] = 0;
                    break;
                case '09':
                    $data['okt'] = 0;
                    $data['nov'] = 0;
                    $data['des'] = 0;
                    break;
                case '10':
                    $data['nov'] = 0;
                    $data['des'] = 0;
                    break;
                case '11':
                    $data['des'] = 0;
                    break;
                case '12':
                    $data['des'] = 0;
                    break;
                default:
                    break;
            }
        }

        return $this->response->setJSON($data);
    }

    public function getPekerjaan()
    {
        $pekerjaans = $this->spkPekerjaanModel->where('tracker', 'order')->findAll();

        $data = [
            'Prestool' => 0,
            'Molding' => 0,
            'Jig & Fixture' => 0,
            'Pengukuran' => 0,
            'Drawing' => 0,
            'Frais' => 0,
            '3D Printing' => 0,
            'Finite Element Analysis (FEA)' => 0
        ];

        foreach ($pekerjaans as $pekerjaan) {
            switch ($pekerjaan['kategori']) {
                case 'Prestool':
                    $data['Prestool']++;
                    break;
                case 'Molding':
                    $data['Molding']++;
                    break;
                case 'Jig & Fixture':
                    $data['Jig & Fixture']++;
                    break;
                case 'Pengukuran':
                    $data['Pengukuran']++;
                    break;
                case 'Drawing':
                    $data['Drawing']++;
                    break;
                case 'Frais':
                    $data['Frais']++;
                    break;
                case '3D Printing':
                    $data['3D Printing']++;
                    break;
                case 'Finite Element Analysis (FEA)':
                    $data['Finite Element Analysis (FEA)']++;
                    break;
                default:
                    break;
            }
        }

        return $this->response->setJSON($data);
    }
}