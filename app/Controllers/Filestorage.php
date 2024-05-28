<?php

namespace App\Controllers;

use App\Models\FileStorageModel;
use App\Models\UserModel;

class Filestorage extends BaseController
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
        $rows = $this->fileStorageModel->findAll();
        $data = [];

        foreach ($rows as $row) {
            $tempData = [
                'id' => $row['id'],
                'no_registrasi' => $row['no_registrasi'],
                'pemesan' => $row['pemesan'],
                'pekerjaan' => $row['pekerjaan'],
                'pdf' => $row['file_pdf'],
                'pdfName' => '',
                'zip' => $row['file_zip'],
                'zipName' => ''
            ];

            if (!empty($row['file_pdf'])) {
                $tempData['pdfName'] = explode('-f&f-', $row['file_pdf'])[1];
            }

            if (!empty($row['file_zip'])) {
                $tempData['zipName'] = explode('-f&f-', $row['file_zip'])[1];
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

        return view('filestorage_view', $response);
    }

    public function delete($id)
    {
        $this->fileStorageModel->delete($id);
        session()->setFlashdata('action', 'Berhasil menghapus data.');

        return redirect()->to('/filestorage');
    }
}