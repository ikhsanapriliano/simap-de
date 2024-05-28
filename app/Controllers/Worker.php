<?php

namespace App\Controllers;

use App\Models\SpkHelperModel;
use App\Models\SpkLampiranModel;
use App\Models\SpkModel;
use App\Models\SpkPekerjaanModel;
use App\Models\SpkProdiModel;
use App\Models\UserModel;

class Worker extends BaseController
{
    private $spkModel;
    private $spkPekerjaanModel;
    private $spkHelperModel;
    private $userModel;
    
    public function __construct()
    {
       $this->spkModel = new SpkModel();
       $this->spkPekerjaanModel = new SpkPekerjaanModel();
       $this->spkHelperModel = new SpkHelperModel();
       $this->userModel = new UserModel();
    }

    public function index()
    {
        $userData = service('request')->userData;
        $user = $this->userModel->find($userData['user_id']);
        $userData['user_photo'] = $user['photo'];

        $spks = $this->spkModel->findAll();
        $workers = $this->userModel->findAll();
        $data = [];

        foreach ($spks as $spk) {
            foreach ($workers as $worker) {
                $tempPekerjaan = [];
                $helpers = $this->spkHelperModel->where([
                    'worker_id' => $worker['id']
                ])->findAll();
                foreach ($helpers as $helper) {
                    $pekerjaans = $this->spkPekerjaanModel->where([
                        'spk_id' => $spk['id'],
                        'status' => 'proses pengerjaan'
                    ])->findAll();
                    foreach ($pekerjaans as $pekerjaan) {
                        if ($pekerjaan['id'] == $helper['pekerjaan_id']) {
                            array_push($tempPekerjaan, $pekerjaan);
                        }
                    }
                }

                if (!empty($tempPekerjaan)) {
                    $tempData = [
                        'nip' => $worker['nip'],
                        'user_level' => $worker['user_level'],
                        'nama' => $worker['nama'],
                        'no_registrasi' => $spk['no_registrasi'],
                        'pekerjaan' => $tempPekerjaan
                    ];
                    array_push($data, $tempData);
                }
            }

        }

        $response=[
            'data' => $data,
            'user_id' => $userData['user_id'],
            'user_level' => $userData['user_level'],
            'username' => $userData['username'],
            'user_photo' => $userData['user_photo'],
        ];

        return view('worker_view', $response);
    }

    public function editprogress($id) {
        $payload = $this->request->getPost();
        $userData = service('request')->userData;

        $data = $this->spkHelperModel->where([
            'pekerjaan_id' => $id, 
            'worker_id' => $userData['user_id']
            ])->first();

        if (empty($data)) {
            session()->setFlashdata('failed', 'Gagal mengupdate data: Anda tidak punya izin akses.');
            return redirect()->to('/worker');
        }

        $update = [
            'progress' => $payload["input-$id"]
        ];
        $this->spkPekerjaanModel->update($id, $update);
        session()->setFlashdata('success', 'Berhasil mengupdate data.');

        return redirect()->to('/worker');
    }
}