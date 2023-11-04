<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Postingan;

class Search extends BaseController
{
    protected $postinganModel;

    public function __construct()
    {
        $this->postinganModel = new Postingan();
    }

    public function index()
    {
        $data = [
            'title' => 'Search',
            'data'  => $this->postinganModel->search($this->request->getVar('search'))
        ];
        return view('Search/index', $data);
    }
}
