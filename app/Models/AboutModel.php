<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{
    protected $table = 'about';
    protected $primaryKey = 'id';
    protected $allowedFields = ['section', 'title', 'content', 'img', 'order'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getAllSections()
    {
        return $this->orderBy('order', 'ASC')->findAll();
    }

    public function getSectionById($id)
    {
        return $this->find($id);
    }

    public function updateSection($id, $data)
    {
        return $this->update($id, $data);
    }

    public function updateSectionImage($id, $imagePath)
    {
        return $this->update($id, ['img' => $imagePath]);
    }
}