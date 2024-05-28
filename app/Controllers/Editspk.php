<?php

namespace App\Controllers;

use App\Models\SpkLampiranModel;
use App\Models\SpkModel;
use App\Models\SpkPekerjaanModel;
use App\Models\SpkProdiModel;
use App\Models\UserModel;
use Config\Database;

class Editspk extends BaseController
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
    
    public function index($id)
    {
        $userData = service('request')->userData;
        $user = $this->userModel->find($userData['user_id']);
        $userData['user_photo'] = $user['photo'];
        $spk = $this->spkModel->find($id);
        $pekerjaans = $this->spkPekerjaanModel->where(['spk_id' => $id, 'tracker' => 'bidd'])->findAll();
        $lampirans = $this->spkLampiranModel->where(['spk_id' => $id])->findAll();
        $prodis = $this->spkProdiModel->findAll();
        
        $data = [
            'spk' => $spk,
            'pekerjaans' => [],
            'lampirans' => [],
            'user_id' => $userData['user_id'],
            'user_level' => $userData['user_level'],
            'username' => $userData['username'],
            'user_photo' => $userData['user_photo'],
        ];
        
        foreach ($lampirans as $lampiran) {
            array_push($data['lampirans'], $lampiran);
        }

        foreach ($pekerjaans as $pekerjaan) {
            $tempPekerjaan = [
                'pekerjaan_id' => $pekerjaan['id'],
                'nama' => $pekerjaan['pekerjaan'],
                'kategori' => $pekerjaan['kategori'],
                'prodi' => [],
                'keterangan' => $pekerjaan['keterangan']
            ];

            foreach ($prodis as $prodi) {
                if ($prodi['pekerjaan_id'] == $pekerjaan['id']) {
                    array_push($tempPekerjaan['prodi'], $prodi['prodi']);
                }
            }

            array_push($data['pekerjaans'], $tempPekerjaan);
        }

        return view('editspk_view', $data);
    }

    public function edit($id)
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
            $this->spkModel->update($id, $spk);

            $oldLampirans = $this->spkLampiranModel->where(['spk_id' => $id])->findAll();
            $oldInputLampirans = [];
            foreach ($oldLampirans as $index => $oldLampiran) {
                $groupIndex = $index + 1;
                $fileId = $this->request->getPost("old-lampiran-$groupIndex"); 
                if (!empty($fileId)) {
                    array_push($oldInputLampirans, $fileId);
                }
            }
            foreach ($oldLampirans as $oldLampiran) {
                $deleted = true;
                foreach ($oldInputLampirans as $oldInputLampiran) {
                    if ($oldInputLampiran == $oldLampiran['id']) {
                        $deleted = false;
                    }
                }
    
                if ($deleted) {
                    $this->spkLampiranModel->delete($oldLampiran['id']);

                    $oldFilePath = 'aset/lampiran/' . $oldLampiran['lampiran'];
                    if (!empty($oldLampiran['lampiran'])) {
                        helper($oldFilePath);
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    }
                }
            }

            if (!empty($lampirans)) {
                foreach ($lampirans['lampiran'] as $lampiran) {
                    $fileName = $lampiran->getRandomName() . '$@$' . $lampiran->getName();
                    $dataLampiran = [
                        'lampiran' => $fileName,
                        'spk_id' => $id
                    ];

                    $this->spkLampiranModel->insert($dataLampiran);
                    $lampiran->move('aset/lampiran', $fileName);
                }
            }

            $this->spkPekerjaanModel->where([
                'spk_id' => $id,
                'tracker' => 'bidd'
            ])->delete();
            foreach ($data['pekerjaan'] as $item) {

                $keterangan = $this->request->getPost('keterangan-' . $item['group']);
                $pekerjaan = [
                    'pekerjaan' => $item['nama'],
                    'kategori' => $item['kategori'],
                    'status' => 'belum dikerjakan',
                    'progress' => 0,
                    'keterangan' => $keterangan,
                    'spk_id' => $id,
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
            
            $db->transCommit();
            session()->setFlashdata('insertSuccess', 'Berhasil mengubah data.');

            return redirect()->to('/biddinglistpage');
        } catch (\Throwable $th) {
            $db->transRollback();
            
            dd($th);
        }
    }

    public function delete($id) {
        $lampirans = $this->spkLampiranModel->where(['spk_id' => $id])->findAll();
        
        $this->spkModel->delete($id);
        foreach ($lampirans as  $lampiran) {
            $oldFilePath = 'aset/lampiran/' . $lampiran['lampiran'];
            if (!empty($lampiran['lampiran'])) {
                helper($oldFilePath);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
        }
        
        session()->setFlashdata('insertSuccess', 'Berhasil menghapus data.');

        return redirect()->to('/biddinglistpage');
    }

}