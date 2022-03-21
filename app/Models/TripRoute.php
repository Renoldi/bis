<?php

namespace App\Models;

use App\Entities\TripRoute as EntitiesTripRoute;
use CodeIgniter\Model;

class TripRoute extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'trip_route';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = EntitiesTripRoute::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'startPoint',
        'endPoint',
        'stoppagePoints',
        'pickupVillage',
        'pickupDistrict',
        'dropVillage',
        'dropDistrict',
        'distance',
        'approximateTime',
        'childrenSeat',
        'specialSeat',
        'status',
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
        'name' => 'required|alpha_numeric_punct|min_length[3]|max_length[255]|is_unique[trip_route.name,id,{id}]',
        'startPointstartPoint' => 'required|numeric',
        'endPoint' => 'required|numeric',
        'stoppagePoints' => 'required|alpha_space',
        'pickupVillage' => 'required|alpha_space',
        'pickupDistrict' => 'required|alpha_space',
        'dropVillage' => 'required|alpha_space',
        'dropDistrict' => 'required|alpha_space',
        'distance' => 'required|alpha_numeric',
        'approximateTime' => 'required|alpha_numeric',
        'childrenSeat' => 'required|numeric',
        'specialSeat' => 'required|numeric',
        'status' => 'required|numeric',
        'companyId' => 'required|numeric',
    ];
    protected $validationMessages   = [
        
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
