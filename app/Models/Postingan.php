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

    public function getPostingan()
    {
        $data = $this->select('id_postingan, judul,postingan, postingan.file, users.name, postingan.created_at, profile')
            ->join('users', 'postingan.id_user = users.id', 'inner')->orderBy('postingan.created_at', 'desc')->findAll();
        return $data;
    }

    public function detailPostingan($id)
    {
        $data = $this->select('id_postingan, judul,postingan, postingan.file, users.name, postingan.created_at, profile')
            ->join('users', 'postingan.id_user = users.id', 'inner')->find($id);
        return $data;
    }
}
