<?php

namespace App\Models;

use CodeIgniter\Model;

class Postingan extends Model
{
    protected $table            = 'postingan';
    protected $primaryKey       = 'id_postingan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'judul', 'postingan', 'file'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getPostingan($id = null)
    {
        if ($id == null) {
            $data = $this->select('id_postingan, judul,postingan, postingan.file, users.name, postingan.created_at, profile')
                ->join('users', 'postingan.id_user = users.id', 'inner')->orderBy('postingan.created_at', 'desc')->findAll();
        } else {
            $data = $this->select('id_postingan, judul,postingan, postingan.file, users.name, postingan.created_at, profile')
                ->join('users', 'postingan.id_user = users.id', 'inner')->orderBy('postingan.created_at', 'desc')->where('id_user', $id)->findAll();
        }
        return $data;
    }

    public function detailPostingan($id)
    {
        $data = $this->select('id_postingan, judul,postingan, postingan.file, users.name, postingan.created_at, profile')
            ->join('users', 'postingan.id_user = users.id', 'inner')->find($id);
        return $data;
    }

    public function search($keyword)
    {
        $data = $this->select('id_postingan, judul,postingan, postingan.file, users.name, postingan.created_at, profile')
            ->join('users', 'postingan.id_user = users.id', 'inner')->like('postingan', $keyword)->findAll();
        return $data;
    }
}
