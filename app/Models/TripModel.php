<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Trip;
use OpenApi\Annotations as OA;


class TripModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'trip';
    protected $primaryKey       = 'tripId';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Trip::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tripTitle',
        'type',
        'fleetCategory',
        'route',
        'sheduleId',
        'weekend',
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
        'tripTitle' => 'required|alpha_numeric_punct|min_length[3]|max_length[255]|is_unique[trip.tripTitle,tripId,{tripId}]',
        'type' => 'required|numeric',
        'fleetCategory' => 'required|numeric',
        'route' => 'required|numeric',
        'sheduleId' => 'required|numeric',
        'weekend' => 'required|numeric',
        'status' => 'required|numeric',
        'companyId' => 'required|numeric',
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
