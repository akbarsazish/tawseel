<?php

namespace App\Models;

use CodeIgniter\Model;

class AgreementTempModel extends Model
{
    protected $table            = 'agreement_temp';
    protected $primaryKey       = 'id';
    protected $useTimestamps    = true; // If you want to use created_at and updated_at fields
    protected $createdField     = 'created_at'; // Adjust if your created field is different
    protected $updatedField     = 'updated_at'; // Adjust if your updated field is different
    protected $dateFormat       = 'datetime'; // Adjust based on your date format preference
    protected $protectFields    = true; // Enable field protection
    protected $returnType       = 'array'; // or 'object' based on your preference
    protected $useSoftDeletes   = false; // Set to true if using soft deletes       
    protected $useAutoIncrement = true;
    
    // Fields that are allowed to be saved
    protected $allowedFields = [
        'term_sub',
        'title',
        'title_2',
        'title_desc',
        'version',
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
        'created_at',
        'updated_at',
        'sub_type',
        'agreement_administration',
        'agreement_administration_1',
        'independent_contractor_desc',
        'liability_desc_sub',
        'liability_desc_part2',
        'receipts',
        'insurance_sub',
        'insurance_sub_desc',
        'insurance_desc_part2',
        'no_lien_desc',
        'records_audit_desc',
        'prohibited_payments_desc',
        'environmental_policy_desc',
        'compliance_laws_desc',
        'prohibited_payments_sub',
        'prohibited_payments_sub_desc',
        'prohibited_payments_sub_desc2',
        'global_conditions_desc',
        'non_assignability_desc',
        'confidentiality_desc',
        'confidentiality',
    ];
}