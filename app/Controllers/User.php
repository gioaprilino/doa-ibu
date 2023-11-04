<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function user($username)
    {
        $user = $this->userModel->where('username', $username)->first();
        $data = [
            'title' => 'User ' . $user->username,
            'data'  => $user
        ];
        return view('User/index', $data);
    }
}
