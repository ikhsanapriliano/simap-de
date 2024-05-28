<?php

namespace App\Controllers;

use App\Models\UserModel;
use Exception;

class DeleteAccount extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function delete($id)
    {
        $userData = service('request')->userData;
        if ($userData['user_level'] != 'admin') {
            throw new Exception("you don't have access permission");
        }
        $oldData = $this->userModel->find($id);

        $oldFilePath = 'aset/img/profile/' . $oldData['photo'];
        if (!empty($oldData['photo'])) {
            helper($oldFilePath);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $this->userModel->delete($id);
        session()->setFlashdata('delSuccess', 'Account successfully deleted');

        return redirect()->to('manageaccount');
    }
}