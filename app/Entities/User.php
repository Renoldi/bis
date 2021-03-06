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
 *      type="integer",
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
class User extends Entity
{
    // map => original field
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    protected $attributes = [
        'firstname' => null,
        'lastname' => null,
        'about' => null,
        'email' => null,
        'password' => null,
        'passwordResetToken' => null,
        'image' => null,
        'lastLogin' => null,
        'lastLogout' => null,
        'ipAddress' => null,
        'status' => null,
        'isAdmin' => null,
        'companyId' => null,
    ];

    public function setPassword(string $pass)
    {
        $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);
        return $this;
    }

    public function setisAdmin(bool $isAdmin = false)
    {
        $this->attributes['isAdmin'] = ($isAdmin ? 1 : 0);
        return $this;
    }

    public function setStatus(bool $status = false)
    {
        $this->attributes['status'] = ($status ? 1 : 0);
        return $this;
    }
    
}
