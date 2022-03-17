<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="Trip",
 * @OA\Property(
 *      property="tripId ",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="tripTitle ",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="type ",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="fleetCategory ",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="route ",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="sheduleId ",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="weekend ",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="status ",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="companyId ",
 *      type="integer",
 *    ),
 * )
 */
class Trip extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    protected $attributes = [
        'type' => null,
        'fleetCategory' => null,
        'route' => null,
        'sheduleId' => null,
        'weekend' => null,
        'status' => null,
        'companyId' => null,
    ];

    public function setType(string $type): self
    {
        $this->attributes['type'] = $type;
        return $this;
    }

    public function setFleetCategory(string $fleetCategory): self
    {
        $this->attributes['fleetCategory'] = $fleetCategory;
        return $this;
    }

    public function setRoute(int $route): self
    {
        $this->attributes['route'] = $route;
        return $this;
    }

    public function setSheduleId(string $sheduleId): self
    {
        $this->attributes['sheduleId'] = $sheduleId;
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
    public function setCompanyId(string $companyId): self
    {
        $this->attributes['companyId'] = $companyId;
        return $this;
    }
}
