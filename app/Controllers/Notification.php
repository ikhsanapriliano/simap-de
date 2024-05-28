<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\SpkModel;
use App\Models\SpkPekerjaanModel;
use DateTime;

class Notification extends BaseController
{
    private $notificationModel;
    private $spkModel;
    private $spkPekerjaanModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
        $this->spkModel = new SpkModel();
        $this->spkPekerjaanModel = new SpkPekerjaanModel();
    }

    public function getAll()
    {
        $this->notificationModel->where('type', 'ngaret')->delete();
        $spks = $this->spkModel->findAll();

        foreach ($spks as $spk) {
            $pekerjaans = $this->spkPekerjaanModel->where([
                'spk_id' => $spk['id'],
                'tracker' => 'order'
            ])->findAll();

            foreach ($pekerjaans as $pekerjaan) {
                if ($pekerjaan['status'] != 'selesai') {
                    $timeNow = new DateTime();
                    $now = $timeNow->format('Y-m-d');
                    if ($now > $spk['deadline']) {
                        $alertData = [
                            'type' => 'ngaret',
                            'message' => 'Pekerjaan dengan nama ' . $pekerjaan['pekerjaan'] . ' dan no registrasi ' . $spk['no_registrasi'] . ' telah melewati batas.',
                            'status' => 'unread'
                        ];
    
                        $this->notificationModel->insert($alertData);
                    }
                }
            }
        }

        $notifs = $this->notificationModel->orderBy('created_at', 'DESC')->findAll();

        return $this->response->setJSON($notifs);
    }

    public function readAll()
    {
        $this->notificationModel->where('status', 'unread')->delete();

        $res =[
            'status' => 200
        ];
        return $this->response->setJSON($res);
    }
}