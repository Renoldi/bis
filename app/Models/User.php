<?php

namespace App\Models;

use App\Entities\User as EntitiesUser;
use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = EntitiesUser::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'firstname',
        'lastname',
        'about',
        'email',
        'password',
        'passwordResetToken',
        'image',
        'lastLogin',
        'lastLogout',
        'ipAddress',
        'status',
        'isAdmin',
        'companyId',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'email' => 'required|valid_email|is_unique[user.email]',
        'isAdmin' => 'required|integer',
        'firstname' => 'required',
        'about' => 'required',
        'password' => 'required',
        'status' => 'required', 
        'companyId' => 'required|integer',
         
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
