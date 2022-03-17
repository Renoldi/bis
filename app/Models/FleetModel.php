<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Fleets;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="FleetModel",
 *   type="integer",
 *   format="int64",
 *   description="The unique identifier of a product in our catalog"
 * )
 */
class FleetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'fleet';
    protected $primaryKey       = 'trip_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Fleets::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'type',
        'fleet_category',
        'route',
        'shedule_id',
        'weekend',
        'status',
        'company_id',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
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
