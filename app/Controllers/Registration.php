<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use Config\Services;

class Registration extends BaseController
{
    private $userModel;
    private $roleModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('registration_view');
    }

    public function create()
    {
        $this->roleModel->db->transBegin();
        try {
            $payload = $this->request->getPost();

            $validation = Services::validation();
            $validation->setRules([
                    'fullname' => 'required',
                    'email' => 'required|valid_email|is_unique[user.email]',
                    'password' => 'required|min_length[6]',
                    'repeat_password' => 'required|min_length[6]'
            ]);
    
            if (!$validation->run($payload)) {
                dd($validation->getErrors());
            }

            $data = [
                'fullname' => $payload['fullname'],
                'email' => $payload['email'],
                'password' => password_hash($payload['password'], PASSWORD_DEFAULT)
            ];
            $this->userModel->insert($data);
            $user = $this->userModel->where('email', $data['email'])->first();

            $role = [
                'type' => 'user',
                'user_id' => $user['id']
            ];

            $result = $this->userModel->db->transCommit();
            d($result);

            echo "success";
        } catch (\Throwable $th) {
            $this->roleModel->db->transRollback();
            dd($th);
        }

    }
}


