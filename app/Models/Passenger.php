<?php

namespace App\Models;

use App\Entities\Passenger as EntitiesPassenger;
use CodeIgniter\Model;

class Passenger extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tkt_passenger';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = EntitiesPassenger::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'idNo',
        'firstname',
        'lastname',
        'middleName',
        'phone',
        'email',
        'password',
        'passwordResetToken',
        'rememberToken',
        'image',
        'city',
        'addressLine1',
        'zipCode',
        'country',
        'status',
        'lastLogin',
        'ipAddress',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'idNo' => "required|",
        'firstname' => "required|",
        'phone' => "required|",
        'email' => 'required|valid_email|is_unique[tkt_passenger.email,id,{id}]',
        'password' => "required|min_length[6]",
        'addressLine1' => "required|",
        'zipCode' => "required|",
        'status' => "required|",
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
