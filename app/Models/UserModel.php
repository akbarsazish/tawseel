<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    'id',
    'email', 
    'email_verified',
    'phone',
    'phone_verified',
    'password',
    'type',
    'sub_type',
    'logistics_type',
    'role',
    'cr',
    'created_at',
    'updated_at',
    'fullname',
    'remember_token',
    'remember_expires',
    'address_line_1',
    'address_line_2',
    'way',
    'country',
    'province', 
    'state',
    'city',
    'location',
    'latitude',
    'longitude',
    ];
    
    protected $useTimestamps = true;

    protected $beforeInsert = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) 
        {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}