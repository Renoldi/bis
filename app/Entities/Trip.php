<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *   schema="Trip",
 * @OA\Property(
 *      property="tripId",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="tripTitle",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="type",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="fleetCategory",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="route",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="sheduleId",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="weekend",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="status",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="companyId",
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
        'tripTitle' => null,
        'type' => null,
        'fleetCategory' => null,
        'route' => null,
        'sheduleId' => null,
        'weekend' => null,
        'status' => null,
        'companyId' => null, 
    ];

    public function setTripTitle(string $tripTitle)
    {
        $this->attributes['tripTitle'] = trim($tripTitle);

        return $this;
    }
}
