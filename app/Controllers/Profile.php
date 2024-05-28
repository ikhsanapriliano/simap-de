<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Config\Services;

class Profile extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index($id)
    {
        $userData = service('request')->userData;
        if ($userData['user_level'] != 'admin') {
            if ($userData['user_id'] != $id) {
                return redirect()->to('/profile-' . $userData['user_id']);
            }
        }

        $user = $this->userModel->where('id', $id)->first();
        if (empty($user)) {
            return redirect()->to('/manageaccount');
        }
        $response = [
            'user_id' => $userData['user_id'],
            'username' => $userData['username'],
            'user_level' => $userData['user_level'],
            'user_photo' => $user['photo'],
            'data' => $user
        ];

        return view('profile_view', $response);
    }

    public function editProfile($id)
    {
        $userData = service('request')->userData;
        if ($userData['user_level'] != 'admin') {
            return redirect()->to('/profile-' . $userData['user_id']);
        }

        $payload = $this->request->getRawInput();
        if (empty($payload)) {
            session()->setFlashdata('empty', 'Nothing to change');
            return redirect()->to('/profile-' . $id);
        }

        $validation = Services::validation();
        $validation->setRules([
                'username' => 'is_unique[user.username]',
        ]);

        if (!$validation->run($payload)) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/profile-' . $id);
        }

        if ($payload['user_level'] != 'admin' && $payload['user_level'] != 'user') {
            if (empty($payload['nip'])) {
                session()->setFlashdata('nipError', 'The NIP field is required.');
                return redirect()->to('/profile-' . $id);
            }
        }
        
        $data = [];
        if (!empty($payload['nip'])) $data['nip'] = $payload['nip'];
        if (!empty($payload['nama'])) $data['nama'] = $payload['nama'];
        if (!empty($payload['user_level'])) $data['user_level'] = $payload['user_level'];
        if (!empty($payload['username'])) $data['username'] = $payload['username'];

        if ($payload['user_level'] == 'admin' || $payload['user_level'] == 'user') {
            $data['nip'] = null;
        }

        $this->userModel->update($id, $data);
        session()->setFlashdata('editSuccess', 'Data successfully updated');

        return redirect()->to('/profile-' . $id);
    }

    public function editAdditionalData($id)
    {
        $userData = service('request')->userData;
        if ($userData['user_level'] != 'admin') {
            if ($userData['user_id'] != $id) {
                return redirect()->to('/profile-' . $userData['user_id']);
            }
        }

        $payload = $this->request->getRawInput();
        if (empty($payload)) {
            session()->setFlashdata('emptyAdditional', 'Nothing to change');
            return redirect()->to('/profile-' . $id);
        }

        $validation = Services::validation();
        $validation->setRules([
                'email' => 'valid_email',
                'no_telepon' => 'numeric'
        ]);

        if (!$validation->run($payload)) {
            session()->setFlashdata('errorsAdditional', $validation->getErrors());
            return redirect()->to('/profile-' . $id);
        }

        $data = [];
        if (!empty($payload['email'])) $data['email'] = $payload['email'];
        if (!empty($payload['no_telepon'])) $data['no_telepon'] = $payload['no_telepon'];

        $this->userModel->update($id, $data);
        session()->setFlashdata('editSuccess', 'Data successfully updated');

        return redirect()->to('/profile-' . $id);
    }

    public function changePassword($id)
    {
        $userData = service('request')->userData;
        if ($userData['user_level'] != 'admin') {
            if ($userData['user_id'] != $id) {
                return redirect()->to('/profile-' . $userData['user_id']);
            }
        }

        $payload = $this->request->getRawInput();
        if (empty($payload)) {
            session()->setFlashdata('emptyChangePassword', 'Nothing to change');
            return redirect()->to('/profile-' . $id);
        }

        $validation = Services::validation();
        $validation->setRules([
                'newPassword' => 'min_length[6]|required',
                'confirmNewPassword' => 'min_length[6]|matches[newPassword]|required'
        ]);

        if (!$validation->run($payload)) {
            session()->setFlashdata('cpErrors', $validation->getErrors());
            return redirect()->to('/profile-' . $id);
        }

        $data = [
            'password' => password_hash($payload['newPassword'], PASSWORD_DEFAULT)
        ];

        $this->userModel->update($id, $data);
        session()->setFlashdata('editSuccess', 'Data successfully updated');

        return redirect()->to('/profile-' . $id);
    }

    public function changePhoto($id)
    {
        $userData = service('request')->userData;
        if ($userData['user_level'] != 'admin') {
            if ($userData['user_id'] != $id) {
                return redirect()->to('/profile-' . $userData['user_id']);
            }
        }


        $file = $this->request->getFile('photo');

        $validation = Services::validation();
        $validation->setRules([
            'photo' => 'uploaded[photo]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('pError', $validation->getErrors());
            return redirect()->to('/profile-' . $id);
        }

        $fileName = $file->getRandomName();
       

        $data = [
            'photo' => $fileName
        ];

        $oldData = $this->userModel->find($id);

        $oldFilePath = 'aset/img/profile/' . $oldData['photo'];
        if (!empty($oldData['photo'])) {
            helper($oldFilePath);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $file->move('aset/img/profile', $fileName);
        $this->userModel->update($id, $data);
        session()->setFlashdata('editSuccess', 'Data successfully updated');

        return redirect()->to('/profile-' . $id);
    }
}