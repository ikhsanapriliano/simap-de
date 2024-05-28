<?php

namespace App\Controllers;

use App\Models\UserModel;

class print3D extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // ambil data dari web si mesin
        $userData = service('request')->userData;
        $user = $this->userModel->find($userData['user_id']);
        $userData['user_photo'] = $user['photo'];
        return view('3Dprint_view', $userData);
    }
}