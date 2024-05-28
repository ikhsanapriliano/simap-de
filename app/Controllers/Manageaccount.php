<?php

namespace App\Controllers;

use App\Models\UserModel;

class Manageaccount extends BaseController
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
        $data = $this->userModel->findAll();
        
        $response = [
            'user_id' => $userData['user_id'],
            'user_level' => $userData['user_level'],
            'username' => $userData['username'],
            'user_photo' => $userData['user_photo'],
            'data' => $data
        ];
        return view('manageaccount_view', $response);
    }

    public function create()
    {

    }
}