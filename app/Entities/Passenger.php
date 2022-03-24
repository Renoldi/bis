<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
/**
 * @OA\Schema(
 *   schema="Passenger",
 * @OA\Property(
 *      property="id",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="idNo",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="firstname",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="lastname",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="middleName",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="phone",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="nid",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="email",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="passwordResetToken",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="rememberToken",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="password",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="image",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="addressLine1",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="addressLine2",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="city",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="zipCode",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="country",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="status",
 *      type="bool",
 *    ),
 * )
 */
class Passenger extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    protected $attributes   = [
        'idNo' => null,
        'firstname' => null,
        'lastname' => null,
        'middleName' => null,
        'phone' => null,
        'email' => null,
        'password' => null,
        'passwordResetToken' => null,
        'rememberToken' => null,
        'image' => null,
        'city' => null,
        'addressLine1' => null,
        'zipCode' => null,
        'country' => null,
        'status' => null,
        'lastLogin' => null,
        'ipAddress' => null,
    ];
    public function setStatus(bool $status = false)
    {
        $this->attributes['status'] = ($status ? 1 : 0);
        return $this;
    }

    public function setPassword(string $pass)
    {
        $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);
        return $this;
    }
}
