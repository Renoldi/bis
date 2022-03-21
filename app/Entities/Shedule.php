<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @OA\Schema(
 *   schema="Shedule",
 * @OA\Property(
 *      property="sheduleId",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="start",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="end",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="duration",
 *      type="decimal",
 *    ),
 * @OA\Property(
 *      property="companyId",
 *      type="integer",
 *    ),
 * )
 */
class Shedule extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    protected $attributes = [
        'start' => null,
        'end' => null,
        'duration' => null,
        'companyId' => null,
    ];
}
