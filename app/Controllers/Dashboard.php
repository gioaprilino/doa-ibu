<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Comment;
use App\Models\Postingan;

class Dashboard extends BaseController
{
    protected $postinganModel;
    protected $komenModel;
    public function __construct()
    {
        $this->postinganModel = new Postingan();
        $this->komenModel = new Comment();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'data'  => $this->postinganModel->getPostingan(),
            'komenModel'    => $this->komenModel
        ];
        return view('Dashboard/index', $data);
    }
}
