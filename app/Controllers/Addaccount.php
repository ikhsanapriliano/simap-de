<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Config\Services;
use Exception;

class Addaccount extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userData = service('request')->userData;
        $user = $this->userModel->find($userData['user_id']);
        $userData['user_photo'] = $user['photo'];
        return view('addaccount_view', $userData);
    }

    public function create()
    {
        $userData = service('request')->userData;
        $payload = $this->request->getPost();
        $validation = Services::validation();
        $validation->setRules([
                'nama' => 'required',
                'user_level' => 'required',
                'username' => 'required|is_unique[user.username]',
                'password' => 'required|min_length[6]',
        ]);

        if (!$validation->run($payload)) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/addaccount');
        }

        if ($payload['user_level'] != 'admin' && $payload['user_level'] != 'user') {
            if (empty($payload['nip'])) {
                session()->setFlashdata('nipError', 'The nip field is required.');
                return redirect()->to('addaccount');
            }
        }

        $payload['password'] = password_hash($payload['password'], PASSWORD_DEFAULT);
        $data = [
            'nip' => !empty($payload['nip']) ? $payload['nip'] : null,
            'nama' => $payload['nama'],
            'user_level' => $payload['user_level'],
            'username' => $payload['username'],
            'password' => $payload['password'],
        ];

        $this->userModel->insert($data);
        $response = [
            'user_level' => $userData['user_level'],
            'message' => "akun berhasil didaftarkan"
        ];

        return redirect()->to('/manageaccount')->with('data', $response);
    }
}