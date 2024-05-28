<?php

namespace App\Controllers;

use App\Models\FileStorageModel;
use App\Models\UserModel;

class EditFilestorage extends BaseController
{
    private $fileStorageModel;
    private $userModel;

    public function __construct()
    {
        $this->fileStorageModel = new FileStorageModel();
        $this->userModel = new UserModel();
    }

    public function index($id)
    {
        $userData = service('request')->userData;
        $user = $this->userModel->find($userData['user_id']);
        $userData['user_photo'] = $user['photo'];
        $data = $this->fileStorageModel->find($id);
        $response=[
            'data' => $data,
            'user_id' => $userData['user_id'],
            'user_level' => $userData['user_level'],
            'username' => $userData['username'],
            'user_photo' => $userData['user_photo'],
        ];
        
        return view('editfile_view', $response);
    }

    public function edit($id)
    {
        $payload = $this->request->getPost();
        $pdfFile = $this->request->getFile('pdf');
        $zipFile = $this->request->getFile('zip');
        
        $oldData = $this->fileStorageModel->find($id);
        
        $data = [
            'no_registrasi' => $payload['no_registrasi'],
            'pemesan' => $payload['pemesan'],
            'pekerjaan' => $payload['pekerjaan'],
        ];

        if ($pdfFile->getName() != "") {
            $pdfName = $pdfFile->getRandomName() . '-f&f-' . $pdfFile->getName();
            $data['file_pdf'] = $pdfName;

            $oldFilePath = 'aset/storage/pdf/' . $oldData['file_pdf'];
            if (!empty($oldData['file_pdf'])) {
                helper($oldFilePath);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $pdfFile->move('aset/storage/pdf/', $pdfName);
        }

        if ($zipFile->getName() != "") {
            $zipName = $zipFile->getRandomName() . '-f&f-' . $zipFile->getName();
            $data['file_zip'] = $zipName;

            $oldFilePath = 'aset/storage/zip/' . $oldData['file_zip'];
            if (!empty($oldData['file_zip'])) {
                helper($oldFilePath);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $zipFile->move('aset/storage/zip/', $zipName);
        }

        if (!empty($payload['deleted-pdf'])) {
            if ($payload['deleted-pdf'] == 'true') {
                $data['file_pdf'] = null;
                $oldFilePath = 'aset/storage/pdf/' . $oldData['file_pdf'];
                if (!empty($oldData['file_pdf'])) {
                    helper($oldFilePath);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }
            }
        }

        if (!empty($payload['deleted-zip'])) {
            if ($payload['deleted-zip'] == 'true') {
                $data['file_zip'] = null;
                d($data['file_zip']);
                $oldFilePath = 'aset/storage/zip/' . $oldData['file_zip'];
                if (!empty($oldData['file_zip'])) {
                    helper($oldFilePath);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }
            }
        }

        $this->fileStorageModel->update($id, $data);
        session()->setFlashdata('action', 'Berhasil mengubah data.');

        return redirect()->to('/filestorage');
    }
}