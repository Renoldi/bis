<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $datamap = [
        'password_reset_token' => "passwordResetToken",
        'last_login' => "lastLogin",
        'last_logout' => "lastLogout",
        'ip_address' => "ipAddress",
        'is_admin' => "isAdmin",
        'company_id' => "companyId",
    ];
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
        'company_id' => null,
    ];

    public function setPassword(string $pass)
    {
        $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);
        return $this;
    }
}