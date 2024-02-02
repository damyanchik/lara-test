<?php

declare(strict_types=1);

namespace App\DTOs;

use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;

class ExternalUserDTO implements JWTSubject
{
    public string $login;
    public string $password;
    public string $company;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
        $this->company = Str::limit($login, 3, '');
    }

    public function getJWTIdentifier()
    {
        return $this->login;
    }

    public function getJWTCustomClaims()
    {
        return [
            'login' => $this->login,
            'loggedIn_at' => now(),
        ];
    }
}
