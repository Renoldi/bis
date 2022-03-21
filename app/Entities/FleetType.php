<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
/**
 * @OA\Schema(
 *   schema="FleetType",
 * @OA\Property(
 *      property="id",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="name",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="type",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="layout",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="lastSeat",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="totalSeat",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="seatNumbers",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="fleetFacilities",
 *      type="string",
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
class FleetType extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    protected $attributes = [
        'name' => null,
        'type' => null,
        'layout' => null,
        'lastSeat' => null,
        'totalSeat' => null,
        'seatNumbers' => null,
        'fleetFacilities' => null,
        'status' => null,
        'companyId' => null,
    ];
    public function setStatus(bool $status = false)
    {
        $this->attributes['status'] = ($status ? 1 : 0);
        return $this;
    }
}
