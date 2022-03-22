<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @OA\Schema(
 *   schema="TripAssign",
 * @OA\Property(
 *      property="id",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="idNo",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="fleetRegistrationId",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="trip",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="assignTime",
 *      type="datetime",
 *    ),
 * @OA\Property(
 *      property="driverId",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="assistant1",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="assistant2",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="assistant3",
 *      type="integer",
 *    ), 
 * @OA\Property(
 *      property="soldTicket",
 *      type="double",
 *    ),
 * @OA\Property(
 *      property="totalIncome",
 *      type="double",
 *    ), 
 * @OA\Property(
 *      property="totalExpense",
 *      type="double",
 *    ),
 * @OA\Property(
 *      property="totalFuel",
 *      type="double",
 *    ),
 * @OA\Property(
 *      property="tripComment",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="closedById",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="date",
 *      type="datetime",
 *    ),
 * @OA\Property(
 *      property="status",
 *      type="bool",
 *    ),
 * @OA\Property(
 *      property="companyId",
 *      type="integer",
 *    ),
 * )
 */
class TripAssign extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    protected $attributes   = [
        'idNo',
        'fleetRegistrationId',
        'trip',
        'assignTime',
        'driverId',
        'assistant1',
        'assistant2',
        'assistant3',
        'soldTicket',
        'totalIncome',
        'totalExpense',
        'totalFuel',
        'tripComment',
        'closedById',
        'date',
        'status',
        'companyId',
    ];
}
