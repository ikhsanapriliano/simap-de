<?php

namespace App\Controllers;

use App\Models\SpkHelperModel;
use App\Models\SpkLampiranModel;
use App\Models\SpkModel;
use App\Models\SpkPekerjaanModel;
use App\Models\SpkProdiModel;
use App\Models\UserModel;

class ProgressForm extends BaseController
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
        $pekerjaans = $this->spkPekerjaanModel->where(['tracker' => 'order', 'status' => 'proses pengerjaan'])->findAll();
        $data = [];

        foreach ($pekerjaans as $pekerjaan) {
            $tempData = [
                'spk_id' => '',
                'no_registrasi' => '',
                'pemesan' => '',
                'pekerjaan_id' => $pekerjaan['id'],
                'pekerjaan' => $pekerjaan['pekerjaan'],
                'kategori' => $pekerjaan['kategori'],
                'deadline' => '',
                'pic' => '',
                'status' => $pekerjaan['status'],
                'progress' => $pekerjaan['progress'],
                'keterangan' => $pekerjaan['keterangan'],
                'selesai' => $pekerjaan['selesai']
            ];

            foreach ($spks as $spk) {
                if ($spk['id'] == $pekerjaan['spk_id']) {
                    $tempData['spk_id'] = $spk['id'];
                    $tempData['no_registrasi'] = $spk['no_registrasi'];
                    $tempData['pemesan'] = $spk['pemesan'];
                    $tempData['deadline'] = $spk['deadline'];
                    $tempData['pic'] = $spk['pic'];
                }
            }

            array_push($data, $tempData);
        }

        $response=[
            'data' => $data,
            'user_id' => $userData['user_id'],
            'user_level' => $userData['user_level'],
            'username' => $userData['username'],
            'user_photo' => $userData['user_photo'],
        ];

        return view('progressform_view', $response);
    }
}