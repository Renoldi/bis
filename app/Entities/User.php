<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

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