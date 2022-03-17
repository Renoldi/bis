<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Fleets extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    protected $attributes = [
        'type' => null,
        'fleet_category' => null,
        'route' => null,
        'shedule_id' => null,
        'weekend' => null,
        'status' => null,
        'company_id' => null,
    ];
}
