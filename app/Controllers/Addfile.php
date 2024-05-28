<?php

namespace App\Controllers;

use App\Models\FileStorageModel;
use App\Models\UserModel;

class Addfile extends BaseController
{
    private $fileStorageModel;
    private $userModel;

    public function __construct()
    {
        $this->fileStorageModel = new FileStorageModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userData = service('request')->userData;
        $user = $this->userModel->find($userData['user_id']);
        $userData['user_photo'] = $user['photo'];
        return view('addfile_view', $userData);
    }

    public function save()
    {
        $payload = $this->request->getPost();
        $pdfFile = $this->request->getFile('pdf');
        $zipFile = $this->request->getFile('zip');
        
        $data = [
            'no_registrasi' => $payload['no_registrasi'],
            'pemesan' => $payload['pemesan'],
            'pekerjaan' => $payload['pekerjaan'],
            'file_pdf' => null,
            'file_zip' => null
        ];

        if ($pdfFile->getName() != "") {
            $pdfName = $pdfFile->getRandomName() . '-f&f-' . $pdfFile->getName();
            $data['file_pdf'] = $pdfName;
            $pdfFile->move('aset/storage/pdf/', $pdfName);
        }

        if ($zipFile->getName() != "") {
            $zipName = $zipFile->getRandomName() . '-f&f-' . $zipFile->getName();
            $data['file_zip'] = $zipName;
            $zipFile->move('aset/storage/zip/', $zipName);
        }

        $this->fileStorageModel->insert($data);
        session()->setFlashdata('action', 'Berhasil menambahkan data.');

        return redirect()->to('/filestorage');
    }
}