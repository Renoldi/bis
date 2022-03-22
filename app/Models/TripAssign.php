<?php

namespace App\Models;

use CodeIgniter\Model;

class TripAssign extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'trip_assign';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'idNo',
        'fleetRegistrationId',
        'trip',
        'assignTime',
        'driverId',
        'assistant1',
        'assistant2',
        'assistant3',
        'soldTicket',
        'totalIncome',
        'totalExpense',
        'totalFuel',
        'tripComment',
        'closedById',
        'date',
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
        'idNo' => 'required|alpha_numeric_punct|min_length[3]|max_length[255]|is_unique[trip_assign.idNo,id,{id}]',
        'fleetRegistrationId' => 'required',
        'trip' => 'required',
        'assignTime' => 'required',
        'driverId' => 'required',
        'assistant1' => 'required',
        'assistant2' => 'required',
        'assistant3' => 'required',
        'soldTicket' => 'required',
        'totalIncome' => 'required',
        'totalExpense' => 'required',
        'totalFuel' => 'required',
        'tripComment' => 'required',
        'closedById' => 'required',
        'date' => 'required',
        'status' => 'required',
        'companyId' => 'required',
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
