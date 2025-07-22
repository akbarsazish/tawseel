<?php namespace App\Models;

use CodeIgniter\Model;

class SiteInfoModel extends Model
{
    protected $table = 'site_info';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'facebook', 
        'instagram', 
        'twitter', 
        'youtube', 
        'linkedin', 
        'email', 
        'phone', 
        'address_ar', 
        'address_en', 
        'location'
    ];
    

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    protected $validationRules = [
        'email' => 'permit_empty|valid_email',
        'facebook' => 'permit_empty|valid_url',
        'instagram' => 'permit_empty|valid_url',
        'twitter' => 'permit_empty|valid_url',
        'youtube' => 'permit_empty|valid_url',
        'linkedin' => 'permit_empty|valid_url',
    ];

    public function getSiteInfo($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}