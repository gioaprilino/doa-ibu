<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'id_comment';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_postingan', 'id_user', 'comment', 'file'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getComment($id)
    {
        $data =  $this->select('id_comment, comment, comments.created_at, users.name, profile, file')
            ->join('users', 'comments.id_user = users.id', 'left')->where('id_postingan', $id)->findAll();
        return $data;
    }
}
