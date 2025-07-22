<?php

namespace App\Models;

use CodeIgniter\Model;

class IndividualModel extends Model
{
    protected $table = 'individuals';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = [
        // ID Information
        'id_number',
        'id_expire_date',
        'id_first_name',
        'id_second_name',
        'id_third_name',
        'id_sur_name',
        'id_date_of_birth',
        'id_address',
        'id_document',
        'id_back',
        
        // Driving License Information
        'license_number',
        'issued_at',
        'issue_date',
        'expiry_date',
        'driving_license',
        'driving_license_back',
        
        // Vehicle Registration Information
        'vehicle_owner',
        'plate_number',
        'letters_of_plate',
        'registration_issue_date',
        'registration_expiry_date',
        'registration_certificate',
        'registration_certificate_back',
    
        // User and relationship fields
        'pid',
        'parent_id'
    ];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $dateFormat = 'datetime';
    
}