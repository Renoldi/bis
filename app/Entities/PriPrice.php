<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @OA\Schema(
 *   schema="PriPrice",
 * @OA\Property(
 *      property="priceId",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="routeId",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="vehicleTypeId",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="price",
 *      type="decimal",
 *    ),
 * @OA\Property(
 *      property="childrenPrice",
 *      type="decimal",
 *    ),
 * @OA\Property(
 *      property="specialPrice",
 *      type="decimal",
 *    ),
 * @OA\Property(
 *      property="groupPricePerPerson",
 *      type="decimal",
 *    ),
 * @OA\Property(
 *      property="groupSize",
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
class PriPrice extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    protected $attributes = [
        'routeId' => null,
        'vehicleTypeId' => null,
        'price' => null,
        'childrenPrice' => null,
        'specialPrice' => null,
        'groupPricePerPerson' => null,
        'groupSize' => null,
        'companyId' => null,
    ];
}
