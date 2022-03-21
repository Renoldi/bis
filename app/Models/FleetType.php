<?php

namespace App\Models;

use App\Entities\FleetType as EntitiesFleetType;
use CodeIgniter\Model;

class FleetType extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'fleet_type';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = EntitiesFleetType::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'type',
        'layout',
        'lastSeat',
        'totalSeat',
        'seatNumbers',
        'fleetFacilities',
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
        'name' => 'required|alpha_space|min_length[10]|is_unique[fleet_type.name,id,{id}]',
        'type' => 'required|integer',
        'layout' => 'required|alpha_space',
        'lastSeat' => 'required|alpha_space',
        'totalSeat' => 'required|integer',
        'seatNumbers' => 'required|alpha_numeric',
        'fleetFacilities' => 'required|alpha_numeric',
        'status' => 'required|integer',
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
