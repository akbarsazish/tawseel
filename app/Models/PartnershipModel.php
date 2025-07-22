<?php

namespace App\Models;

use CodeIgniter\Model;

class PartnershipModel extends Model
{
    protected $table = 'partnership';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title_en',
        'title_ar', 
        'subtitle_en',
        'subtitle_ar', 
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getPartnershipInfo($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}