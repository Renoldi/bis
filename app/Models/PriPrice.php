<?php

namespace App\Models;

use CodeIgniter\Model;

class PriPrice extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pri_price';
    protected $primaryKey       = 'priceId';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'routeId',
        'vehicleTypeId',
        'price',
        'childrenPrice',
        'specialPrice',
        'groupPricePerPerson',
        'groupSize',
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

    ];
    protected $validationMessages   = [
        'routeId'=> 'required|integer',
        'vehicleTypeId'=> 'required|integer',
        'price'=> 'required|decimal',
        'childrenPrice'=> 'required|decimal',
        'specialPrice'=> 'required|decimal',
        'groupPricePerPerson'=> 'required|decimal',
        'groupSize'=> 'required|integer',
        'companyId'=> 'required|integer',
    ];
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
