<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (empty($_COOKIE['token'])) {
            return redirect()->to('/login');
        }

        $token = $_COOKIE['token'];

        $decoded = (array) JWT::decode($token, new Key(getenv('JWT_SECRET'), 'HS256'));
        $isAuthorized = false;
        foreach ($arguments as $user_level) {
            if ($user_level == $decoded['user_level']) {
                $isAuthorized = true;
            }
        }
        if ($isAuthorized == false) {
            return redirect()->to('/forbidden');
        }
        
        $userData = [
            'user_id' => $decoded['user_id'],
            'username' => $decoded['username'],
            'user_level' => $decoded['user_level'],
        ];
        $request->userData = $userData;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}