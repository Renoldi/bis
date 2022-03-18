<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
/**
 * @OA\Schema(
 *   schema="TripRoute",
 * @OA\Property(
 *      property="id",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="name",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="startPoint",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="endPoint",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="stoppagePoints",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="pickupVillage",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="pickupDistrict",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="dropVillage",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="dropDistrict",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="distance",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="approximateTime",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="childrenSeat",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="specialSeat",
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
class TripRoute extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    protected $attributes = [
        'name' => null,
        'startPoint' => null,
        'endPoint' => null,
        'stoppagePoints' => null,
        'pickupVillage' => null,
        'pickupDistrict' => null,
        'dropVillage' => null,
        'dropDistrict' => null,
        'distance' => null,
        'approximateTime' => null,
        'childrenSeat' => null,
        'specialSeat' => null,
        'status' => null,
        'companyId' => null,
    ];

    public function setName(string $name)
    {
        $this->attributes['name'] = trim($name);
        return $this;
    }

    public function setStoppagePoints(string $stoppagePoints)
    {
        $this->attributes['stoppagePoints'] = trim($stoppagePoints);
        return $this;
    }

    public function setPickupVillage(string $pickupVillage)
    {
        $this->attributes['pickupVillage'] = trim($pickupVillage);
        return $this;
    }

    public function setPickupDistrict(string $pickupDistrict)
    {
        $this->attributes['pickupDistrict'] = trim($pickupDistrict);
        return $this;
    }

    public function setDropVillage(string $dropVillage)
    {
        $this->attributes['dropVillage'] = trim($dropVillage);
        return $this;
    }

    public function setDropDistrict(string $dropDistrict)
    {
        $this->attributes['dropDistrict'] = trim($dropDistrict);
        return $this;
    }

    public function setDistance(string $distance)
    {
        $this->attributes['distance'] = trim($distance);
        return $this;
    }

    public function setApproximateTime(string $approximateTime)
    {
        $this->attributes['approximateTime'] = trim($approximateTime);
        return $this;
    }
}
