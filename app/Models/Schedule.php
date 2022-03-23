<?php

namespace App\Models;

use App\Entities\Schedule as EntitiesSchedule;
use App\Entities\Shedule as EntitiesShedule;
use CodeIgniter\Model;

class Schedule extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'shedule';
    protected $primaryKey       = 'scheduleId';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = EntitiesSchedule::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'start',
        'end',
        'duration',
        'companyId',
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
