<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function logout()
    {
        $token = "";
        setcookie('token', $token, time() - 3600, '/', '', false, true);
        
        return redirect()->to('/dashboard');
    }
}


