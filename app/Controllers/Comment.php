<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Comment as ModelsComment;

class Comment extends BaseController
{
    protected $commentModel;

    public function __construct()
    {
        $this->commentModel = new ModelsComment();
    }

    public function insert($id)
    {
        if (!logged_in()) {
            return redirect()->to('/login');
        }

        if ($this->request->getFile('file')->getSize() == 0) {
            $fileRules = 'if_exist';
            $uploadFile = false;
        } else {
            $fileRules = 'uploaded[file]|is_image[file]|mime_in[file,image/png,image/jpeg]';
            $uploadFile = true;
        }

        if (!$this->validate([
            'comment' => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'komentar tidak boleh kosong'
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
            session()->setFlashdata('error', 'komentar gagal dibuat');
            return redirect()->back()->withInput();
        }

        if ($uploadFile) {
            $img = $this->request->getFile('file');
            $fileName =  $img->getRandomName();
            $filepath = 'uploads/' . user()->username . '/' . 'komentar/';
            $img->move($filepath, $fileName);
            $this->commentModel->insert([
                'id_postingan'  => $id,
                'id_user'   => user_id(),
                'comment' => htmlspecialchars($this->request->getVar('comment')),
                'file'  => $filepath . $fileName
            ]);
        } else {
            $this->commentModel->insert([
                'id_postingan'  => $id,
                'id_user'   => user_id(),
                'comment' => htmlspecialchars($this->request->getVar('comment'))
            ]);
        }

        session()->setFlashdata('success', 'komentar berhasil dibuat');
        return redirect()->back()->withInput();
    }
}
