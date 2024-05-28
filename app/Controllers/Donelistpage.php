<?php

namespace App\Controllers;

use App\Models\SpkHelperModel;
use App\Models\SpkLampiranModel;
use App\Models\SpkModel;
use App\Models\SpkPekerjaanModel;
use App\Models\SpkProdiModel;
use App\Models\UserModel;
use DateTime;

class Donelistpage extends BaseController
{
    private $spkModel;
    private $spkPekerjaanModel;
    private $spkProdiModel;
    private $spkLampiranModel;
    private $spkHelperModel;
    private $userModel;
    
    public function __construct()
    {
       $this->spkModel = new SpkModel();
       $this->spkPekerjaanModel = new SpkPekerjaanModel();
       $this->spkProdiModel = new SpkProdiModel();
       $this->spkLampiranModel = new SpkLampiranModel();
       $this->spkHelperModel = new SpkHelperModel();
       $this->userModel = new UserModel();
    }

    public function index()
    {
        $userData = service('request')->userData;
        $user = $this->userModel->find($userData['user_id']);
        $userData['user_photo'] = $user['photo'];

        $spks = $this->spkModel->findAll();
        $pekerjaans = $this->spkPekerjaanModel->where([
            'status' => 'selesai'
        ])->findAll();
        $prodis = $this->spkProdiModel->findAll();
        $workers = $this->userModel->where('user_level', 'worker')->findAll();
        $pics = $this->userModel->where('user_level', 'pic')->findAll();
        $data = [];
        $unmanage = [];

        foreach ($pekerjaans as $pekerjaan) {
            $tempData = [
                'spk_id' => '',
                'no_registrasi' => '',
                'keluar' => '',
                'terima' => '',
                'pemesan' => '',
                'pekerjaan_id' => $pekerjaan['id'],
                'pekerjaan' => $pekerjaan['pekerjaan'],
                'kategori' => $pekerjaan['kategori'],
                'prodi' => [],
                'deadline' => '',
                'lampiran' => [],
                'pic' => '',
                'helper' => [],
                'status' => $pekerjaan['status'],
                'mulai' => $pekerjaan['mulai'],
                'selesai' => $pekerjaan['selesai'],
                'interval' => ''
            ];

            if (!empty($pekerjaan['mulai']) && !empty($pekerjaan['selesai'])) {
                $mulai = new DateTime($pekerjaan['mulai']);
                $selesai = new DateTime($pekerjaan['selesai']);
                $interval = $mulai->diff($selesai);
                $day = $interval->days;
                $hour = $interval->h;
                $minute = $interval->i;
                $second = $interval->s;
                $tempData['interval'] = "$day hari | $hour jam | $minute menit | $second detik";
            }

            foreach ($spks as $spk) {
                if ($spk['id'] == $pekerjaan['spk_id']) {
                    $tempData['spk_id'] = $spk['id'];
                    $tempData['no_registrasi'] = $spk['no_registrasi'];
                    $tempData['keluar'] = $spk['keluar'];
                    $tempData['terima'] = $spk['terima'];
                    $tempData['pemesan'] = $spk['pemesan'];
                    $tempData['deadline'] = $spk['deadline'];
                    $tempData['pic'] = $spk['pic'];
                }
            }

            $helpers = $this->spkHelperModel->where('pekerjaan_id', $pekerjaan['id'])->findAll();
            foreach ($helpers as $helper) {
                $worker = $this->userModel->where(['id' => $helper['worker_id']])->first();
                $workerData = [
                    'nip' => $worker['nip'],
                    'nama' => $worker['nama']
                ];
                array_push($tempData['helper'], $workerData);
            }
            
            $lampirans = $this->spkLampiranModel->where('spk_id', $tempData['spk_id'])->findAll();
            foreach ($lampirans as $lampiran) {
                $fileName = explode('$@$', $lampiran['lampiran'])[1];
                $fileData = [
                    'fileName' => $fileName,
                    'file' => $lampiran['lampiran']
                ];
                array_push($tempData['lampiran'], $fileData);
            }

            $tempProdi = [];
            foreach ($prodis as $prodi) {
                if ($prodi['pekerjaan_id'] == $pekerjaan['id']) {
                    array_push($tempProdi, $prodi['prodi']);
                }
            }
            $tempData['prodi'] = $tempProdi;

            if (!empty($tempData['helper'])) {
                array_push($data, $tempData);
            } else  {
                array_push($unmanage, $tempData);
            }
        }

        $response=[
            'data' => $data,
            'unmanage' => $unmanage,
            'workers' => $workers,
            'pics' => $pics,
            'user_id' => $userData['user_id'],
            'user_level' => $userData['user_level'],
            'username' => $userData['username'],
            'user_photo' => $userData['user_photo'],
        ];

        return view('donelistpage_view', $response);
    }
}