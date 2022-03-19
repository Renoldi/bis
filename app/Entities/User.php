<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @OA\Schema(
 *   schema="User",
 * @OA\Property(
 *      property="id",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="passwordResetToken",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="lastLogin",
 *      type="datetime",
 *    ),
 * @OA\Property(
 *      property="lastLogout",
 *      type="datetime",
 *    ),
 * @OA\Property(
 *      property="ipAddress",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="isAdmin",
 *      type="bool",
 *    ),
 * @OA\Property(
 *      property="companyId",
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
 *      property="about",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="email",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="password",
 *      type="integer",
 *    ),
 * @OA\Property(
 *      property="image",
 *      type="string",
 *    ),
 * @OA\Property(
 *      property="status",
 *      type="integer",
 *    ), 
 * )
 */
class User extends Entity
{
    // map => original field
    protected $datamap = [
        'passwordResetToken' => "password_reset_token",
        'lastLogin' => "last_login",
        'lastLogout' => "last_logout",
        'ipAddress' => "ip_address",
        'isAdmin' => "is_admin",
        'companyId' => "company_id",
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    protected $attributes = [
        'firstname' => null,
        'lastname' => null,
        'about' => null,
        'email' => null,
        'password' => null,
        'password_reset_token' => null,
        'image' => null,
        'last_login' => null,
        'last_logout' => null,
        'ip_address' => null,
        'status' => null,
        'is_admin' => null,
        'company_id' => null,
    ];

    public function setPassword(string $pass)
    {
        $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);
        return $this;
    }
}