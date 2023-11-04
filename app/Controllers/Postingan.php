<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Comment;
use App\Models\Postingan as ModelsPostingan;

class Postingan extends BaseController
{
    protected $postinganModel;
    protected $komenModel;

    public function __construct()
    {
        $this->postinganModel = new ModelsPostingan();
        $this->komenModel = new Comment();
    }

    public function insert()
    {
        if ($this->request->getFile('file')->getSize() == 0) {
            $fileRules = 'if_exist';
            $uploadFile = false;
        } else {
            $fileRules = 'uploaded[file]|is_image[file]|mime_in[file,image/png,image/jpeg]';
            $uploadFile = true;
        }

        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'judul tidak boleh kosong'
                ]
            ],
            'postingan' => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'konten tidak boleh kosong'
                ]
            ],
            'file'  => [
                'rules' => $fileRules,
                'errors'   => [
                    'uploaded'  => 'file harus diupload',
                    'if_exist'  => 'file masuk diupload',
                    'is_image'  => 'file yang anda upload bukan gambar',
                    'mime_in'   => 'file yang anda upload bukan gambar'
                ]
            ]
        ])) {
            session()->setFlashdata('error', 'postingan gagal dibuat');
            return redirect()->back()->withInput();
        }

        if ($uploadFile) {
            $img = $this->request->getFile('file');
            $fileName =  $img->getRandomName();
            $filepath = 'uploads/' . user()->username . '/' . 'postingan/';
            $img->move($filepath, $fileName);
            $this->postinganModel->insert([
                'id_user'   => user_id(),
                'judul'     => htmlspecialchars($this->request->getVar('judul')),
                'postingan' => htmlspecialchars($this->request->getVar('postingan')),
                'file'  => $filepath . $fileName
            ]);
        } else {
            $this->postinganModel->insert([
                'id_user'   => user_id(),
                'judul'     => htmlspecialchars($this->request->getVar('judul')),
                'postingan' => htmlspecialchars($this->request->getVar('postingan'))
            ]);
        }

        session()->setFlashdata('success', 'postingan berhasil dibuat');
        return redirect()->back()->withInput();
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Postingan',
            'data' => $this->postinganModel->detailPostingan($id),
            'komenModel'    => $this->komenModel
        ];
        return view('Postingan/detail', $data);
    }
}
