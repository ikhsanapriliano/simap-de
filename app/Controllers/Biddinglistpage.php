<?php

namespace App\Controllers;

use App\Models\SpkLampiranModel;
use App\Models\SpkModel;
use App\Models\SpkPekerjaanModel;
use App\Models\SpkProdiModel;
use App\Models\UserModel;
use Config\Database;

class Biddinglistpage extends BaseController
{
    private $spkModel;
    private $spkPekerjaanModel;
    private $spkProdiModel;
    private $spkLampiranModel;
    private $userModel;
    
    public function __construct()
    {
       $this->spkModel = new SpkModel();
       $this->spkPekerjaanModel = new SpkPekerjaanModel();
       $this->spkProdiModel = new SpkProdiModel();
       $this->spkLampiranModel = new SpkLampiranModel();
       $this->userModel = new UserModel();
    }
    
    public function index()
    {
        $userData = service('request')->userData;
        $user = $this->userModel->find($userData['user_id']);
        $userData['user_photo'] = $user['photo'];

        $spks = $this->spkModel->findAll();
        $pekerjaans = $this->spkPekerjaanModel->where('tracker', 'bidd')->findAll();
        $prodis = $this->spkProdiModel->findAll();
        $data = [];

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
                'lampiran' => []
            ];

            foreach ($spks as $spk) {
                if ($spk['id'] == $pekerjaan['spk_id']) {
                    $tempData['spk_id'] = $spk['id'];
                    $tempData['no_registrasi'] = $spk['no_registrasi'];
                    $tempData['keluar'] = $spk['keluar'];
                    $tempData['terima'] = $spk['terima'];
                    $tempData['pemesan'] = $spk['pemesan'];
                    $tempData['deadline'] = $spk['deadline'];
                }
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

            array_push($data, $tempData);
        }
        
        $response = [
            'user_id' => $userData['user_id'],
            'user_level' => $userData['user_level'],
            'username' => $userData['username'],
            'user_photo' => $userData['user_photo'],
            'data' => $data
        ];

        return view('biddinglistpage_view', $response);
    }

    public function addToOrder($id) {
        $userData = service('request')->userData;
        $payload = [
            'tracker' => 'order'
        ];
        $this->spkPekerjaanModel->update($id, $payload);
        session()->setFlashdata('insertSuccess', 'Berhasil menambahkan data ke orderlist.');

        return redirect()->to('/biddinglistpage')->with('data', $userData);
    }
}