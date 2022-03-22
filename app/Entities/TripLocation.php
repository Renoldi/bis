<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
/**
 * @OA\Schema(
 *   schema="TripLocation",
 * @OA\Property(
 *      property="id",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="name",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="description",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="googleMap",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="image",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="status",
 *      type="bool",
 *    ), 
 * )
 */
class TripLocation extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    protected $attributes   = [
        'name' => null,
        'description' => null,
        'googleMap' => null,
        'image' => null,
        'status' => null,
    ];

    public function setStatus(bool $status = false)
    {
        $this->attributes['status'] = ($status ? 1 : 0);
        return $this;
    }
}
