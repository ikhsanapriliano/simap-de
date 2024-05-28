<?php

namespace App\Controllers;

use App\Models\UserModel;

class Forbidden extends BaseController
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
        $userData['untoggled'] = true;
        return view('forbidden_view', $userData);
    }
}