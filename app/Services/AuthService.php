<?php

declare(strict_types=1);

namespace App\Services;

use App\Adapter\AuthAdapter\LoginAdapterInterface;
use App\DTOs\ExternalUserDTO;
use App\Factories\AuthAdapterFactoryInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
    public function __construct(private AuthAdapterFactoryInterface $adapterFactory)
    {
    }

    public function authenticateAcrossAPIs(ExternalUserDTO $externalUser): ?string
    {
        $isLogged = $this->adapterFactory->createAdapter($externalUser->company);

        if (!($isLogged instanceof LoginAdapterInterface)) {
            return null;
        }

        if (!$isLogged->auth($externalUser->login, $externalUser->password)) {
            return null;
        }

        return JWTAuth::fromUser($externalUser);
    }
}
