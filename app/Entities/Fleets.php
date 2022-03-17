<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @OA\Schema(
 *   schema="Fleet",
 * )
 */
class Fleets extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    /**
     * @OA\Property()
     * @var int
     */
    protected $attributes = [
        'type' => null,
        'fleet_category' => null,
        'route' => null,
        'shedule_id' => null,
        'weekend' => null,
        'status' => null,
        'company_id' => null,
    ];


    public function setType(string $type): self
    {
        $this->attributes['type'] = $type;
        return $this;
    }

    public function setFleet_category(string $fleet_category): self
    {
        $this->attributes['fleet_category'] = $fleet_category;
        return $this;
    }

    public function setRoute(int $route): self
    {
        $this->attributes['route'] = $route;
        return $this;
    }

    public function setShedule_id(string $shedule_id): self
    {
        $this->attributes['shedule_id'] = $shedule_id;
        return $this;
    }
    public function setWeekend(string $weekend): self
    {
        $this->attributes['weekend'] = $weekend;
        return $this;
    }
    public function setStatus(string $status): self
    {
        $this->attributes['status'] = $status;
        return $this;
    }
    public function setCompany_id(string $company_id): self
    {
        $this->attributes['company_id'] = $company_id;
        return $this;
    }
}
