<?php namespace App\Models;

use CodeIgniter\Model;

class PartnershipItemModel extends Model
{
    protected $table = 'partnership_item';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'partnership_id',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getItemsByPartnership($partnershipId)
    {
        return $this->where('partnership_id', $partnershipId)->findAll();
    }
}