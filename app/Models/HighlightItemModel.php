<?php

namespace App\Models;

use CodeIgniter\Model;

class HighlightItemModel extends Model
{
    protected $table = 'key_highlight_items';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'icon',
        'title_en',
        'title_ar',  
        'description_ar',
        'description_en',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getHighlightItem($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}