<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @OA\Schema(
 *   schema="Schedule",
 * @OA\Property(
 *      property="scheduleId",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="start",
 *      type="string", example = "08:00:00"
 *    ),
 * @OA\Property(
 *      property="end",
 *      type="string", example = "15:00:00"
 *    ),
 * @OA\Property(
 *      property="duration",
 *      type="double",
 *    ),
 * @OA\Property(
 *      property="companyId",
 *      type="integer",
 *    ),
 * )
 */
class Schedule extends Entity
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
