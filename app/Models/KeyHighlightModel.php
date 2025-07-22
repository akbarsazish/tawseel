<?php

namespace App\Models;

use CodeIgniter\Model;

class KeyHighlightModel extends Model
{
    protected $table = 'key_highlight';
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

    public function getHighlightInfo($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}