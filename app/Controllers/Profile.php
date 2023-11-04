<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Comment;
use App\Models\Postingan;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class Profile extends BaseController
{
    protected $userModel;
    protected $userEntities;
    protected $postinganModel;
    protected $komenModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userEntities = new User();
        $this->postinganModel = new Postingan();
        $this->komenModel = new Comment();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile',
            'data'  => $this->postinganModel->getPostingan(user_id()),
            'komenModel'    => $this->komenModel
        ];
        return view('Profile/index', $data);
    }

    public function update()
    {
        $user = $this->userModel->find(user_id());

        if ($user->username == $this->request->getVar('username')) {
            $usernameRules = 'required';
            $updateUsername = false;
        } else {
            $usernameRules = 'required|alpha_numeric|min_length[3]|max_length[30]|is_unique[users.username]';
            $updateUsername = true;
        }

        if ($user->email == $this->request->getVar('email')) {
            $emailRules = 'required';
            $updateEmail = false;
        } else {
            $emailRules = 'required|valid_email|is_unique[users.email]';
            $updateEmail = true;
        }

        if ($this->request->getFile('profile')->getSize() == 0) {
            $profileRules = 'if_exist';
            $updateProfile = false;
        } else {
            $profileRules = 'uploaded[profile]|is_image[profile]|mime_in[profile,image/png,image/jpeg]';
            $updateProfile = true;
        }

        if (!$this->validate([
            'username'  => [
                'rules' => $usernameRules,
                'errors'    => [
                    'required'      => 'username harus diiisi',
                    'alpha_numeric' => 'username mengandung karakter yang dilarang',
                    'min_length'    => 'username minimal 3 karakter',
                    'max_length'    => 'username maksimal 30 karakter',
                    'is_unique'     => 'username telah terdaftar'
                ]
            ],
            'email' => [
                'rules' => $emailRules,
                'errors'    => [
                    'required'      => 'email harus diisi',
                    'valid_email'   => 'email tidak valid',
                    'is_unique'     => 'email telah terdaftar',
                ]
            ],
            'name'  => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'nama harus diisi'
                ]
            ],
            'profile' => [
                'rules' => $profileRules,
                'errors'   => [
                    'uploaded'  => 'file harus diupload',
                    'if_exist'  => 'file masuk diupload',
                    'is_image'  => 'file yang anda upload bukan gambar',
                    'mime_in'   => 'file yang anda upload bukan gambar'
                ]
            ]
        ])) {
            session()->setFlashdata('error', 'profile gagal diupdate');
            return redirect()->back()->withInput();
        }

        if ($updateUsername) {
            $this->userEntities->username = htmlspecialchars($this->request->getVar('username'));
        }

        if ($updateEmail) {
            $this->userEntities->email = htmlspecialchars($this->request->getVar('email'));
        }

        if ($updateProfile) {
            $oldFile = file_exists($user->profile);
            if ($oldFile && $oldFile != 'default.png') {
                unlink($user->profile);
            }
            $img = $this->request->getFile('profile');
            $fileName =  $img->getRandomName();
            $filepath = 'uploads/' . user()->username . '/' . 'profile/';
            $img->move($filepath, $fileName);
            $this->userEntities->profile =  $filepath . $fileName;
        }

        $this->userEntities->name = $this->request->getVar('name');
        $this->userModel->update(user_id(), $this->userEntities);

        session()->setFlashdata('success', 'profile berhasil diupdate');
        return redirect()->back();
    }
}
