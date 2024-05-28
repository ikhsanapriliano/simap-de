<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use CodeIgniter\Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;
use Firebase\JWT\JWT;

class Login extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (!empty($_COOKIE['token'])) {
            return redirect()->to('/dashboard');
        }

        return view('login_view');
    }

    public function get()
    {
        $payload = $this->request->getPost();
        $validation = Services::validation();
        $validation->setRules([
                'username' => 'required',
                'password' => 'required|min_length[6]',
        ]);

        if (!$validation->run($payload)) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/login');
        }

        $user = $this->userModel->where('username', $payload['username'])->first();
        
        if (empty($user['id'])) {
            session()->setFlashdata('notFound', 'account not found');
            return redirect()->to('/login');
        }

        if (!password_verify($payload['password'], $user['password'])) {
            session()->setFlashdata('wrongPassword', 'wrong password');
            return redirect()->to('/login');        }

        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;

        $jwtPayload = [
            'iss' => 'simap-de',
            'sub' => 'logintoken',
            'iat' => $iat,
            'exp' => $exp,
            'user_id' => $user['id'],
            'username' => $user['username'],
            'user_level' => $user['user_level'],
            'photo' => $user['photo']
        ];

        $token = JWT::encode($jwtPayload, $key, 'HS256');

        setcookie('token', $token, time() + 3600, '/', '', false, true);

        return redirect()->to('/dashboard');
    }
}


