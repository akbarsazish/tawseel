<?php

namespace App\Models;

use CodeIgniter\Model;

class AgreementModel extends Model
{
    protected $table = 'agreements';
    protected $primaryKey = 'id'; // Adjust this if your primary key is different
    protected $useAutoIncrement = true;
    protected $useTimestamps = true; // If you want to use created_at and updated_at fields
    protected $createdField = 'created_at'; // Adjust if your created field is different
    protected $updatedField = 'updated_at'; // Adjust if your updated field is different
    protected $dateFormat = 'datetime'; // Adjust based on your date format preference
    protected $protectFields = true; // Enable field protection
    protected $returnType = 'array'; // or 'object' based on your preference
    protected $useSoftDeletes = false; // Set to true if using soft deletes

   protected $allowedFields = [
        'title',
        'title_2',
        'title_desc',
        'legal_name',
        'commercial_name',
        'address',
        'cr_no',
        'phone',
        'email',
        'recitals_desc',
        'term_desc',
        'appointment_desc',
        'logistics_desc',
        'compensation_desc',
        'liability_desc',
        'insurance_desc',
        'law_desc',
        'termination_desc',
        'term_sub',
        'created_at',
        'updated_at',
        'pid', // Assuming 'pid' is a foreign key or related field
    ];
}