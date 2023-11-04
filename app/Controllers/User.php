<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Comment;
use App\Models\Postingan;
use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    protected $postinganModel;
    protected $komenModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->postinganModel = new Postingan();
        $this->komenModel = new Comment();
    }

    public function user($username)
    {
        $user = $this->userModel->where('username', $username)->first();
        $data = [
            'title' => 'User ' . $user->username,
            'dataUser'  => $user,
            'data'  => $this->postinganModel->getPostingan($user->id),
            'komenModel'    => $this->komenModel
        ];
        return view('User/index', $data);
    }
}
