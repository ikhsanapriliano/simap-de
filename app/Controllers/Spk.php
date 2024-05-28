<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\SpkHelperModel;
use App\Models\SpkLampiranModel;
use App\Models\SpkModel;
use App\Models\SpkPekerjaanModel;
use App\Models\SpkProdiModel;
use CodeIgniter\I18n\Time;
use Config\Database;
use PhpParser\Node\Stmt\TryCatch;

class Spk extends BaseController
{
    private $spkModel;
    private $spkPekerjaanModel;
    private $spkProdiModel;
    private $spkLampiranModel;
    private $notificationModel;
    
    public function __construct()
    {
       $this->spkModel = new SpkModel();
       $this->spkPekerjaanModel = new SpkPekerjaanModel();
       $this->spkProdiModel = new SpkProdiModel();
       $this->spkLampiranModel = new SpkLampiranModel();
       $this->notificationModel = new NotificationModel();
    }

    public function create()
    {
        $userData = service('request')->userData;

        return view ('createspk_view', $userData);
    }

    public function save()
    {
        $payload = $this->request->getPost()['json_data'];  
        $lampirans = $this->request->getFiles();

        $data = json_decode($payload, true);
        
        $db = Database::connect();

        $db->transBegin();
        try {
            $spk = [
                'no_registrasi' => $data['no_registrasi'],
                'keluar' => $data['keluar'],
                'terima' => $data['terima'],
                'Pemesan' => $data['pemesan'],
                'deadline' => $data['deadline'],
            ];
            $this->spkModel->insert($spk);
            $spkId = $this->spkModel->getInsertID();

            if (!empty($lampirans)) {
                foreach ($lampirans['lampiran'] as $lampiran) {
                    $fileName = $lampiran->getRandomName() . '$@$' . $lampiran->getName();
                    $dataLampiran = [
                        'lampiran' => $fileName,
                        'spk_id' => $spkId
                    ];

                    $this->spkLampiranModel->insert($dataLampiran);
                    $lampiran->move('aset/lampiran', $fileName);
                }
            }

            foreach ($data['pekerjaan'] as $item) {
                $keterangan = $this->request->getPost('keterangan-' . $item['group']);
                $pekerjaan = [
                    'pekerjaan' => $item['nama'],
                    'kategori' => $item['kategori'],
                    'status' => 'belum dikerjakan',
                    'progress' => 0,
                    'keterangan' => $keterangan,
                    'spk_id' => $spkId,
                    'tracker' => 'bidd'
                ];

                $this->spkPekerjaanModel->insert($pekerjaan);
                $pekerjaanId = $this->spkPekerjaanModel->getInsertID();

                foreach ($item['prodi'] as $prodi) {
                    $prodi = [
                        'prodi' => $prodi,
                        'pekerjaan_id' => $pekerjaanId
                    ];
                    $this->spkProdiModel->insert($prodi);
                }
            }
            
            $notifData = [
                'type' => 'bidd',
                'message' => 'Ada bidd baru dengan no registrasi ' . $spk['no_registrasi'] . ".",
                'status' => 'unread'
            ];
            $this->notificationModel->insert($notifData);

            $db->transCommit();
            session()->setFlashdata('insertSuccess', 'Berhasil menambahkan data.');

            return redirect()->to('/biddinglistpage');
        } catch (\Throwable $th) {
            $db->transRollback();
            
            dd($th);
        }
    }
}
    


   