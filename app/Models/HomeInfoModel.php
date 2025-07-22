<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeInfoModel extends Model
{
    protected $table = 'homeinfo';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title_en', 'title_ar', 
        'title2_en', 'title2_ar', 
        'description_en', 'description_ar'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getHomeInfo($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}