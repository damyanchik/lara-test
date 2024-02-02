<?php

declare(strict_types=1);

namespace App\Adapter\AuthAdapter;

use External\Bar\Auth\LoginService;

class BarAuthAdapter implements LoginAdapterInterface
{
    public function __construct(private LoginService $loginService)
    {
    }

    public function auth(string $login, string $password): bool
    {
        return $this->loginService->login($login, $password);
    }
}
