<?php

declare(strict_types=1);

namespace App\Adapter\AuthAdapter;

use External\Baz\Auth\Authenticator;
use External\Baz\Auth\Responses\Success;

class BazAuthAdapter implements LoginAdapterInterface
{
    public function __construct(private Authenticator $authenticator)
    {
    }

    public function auth(string $login, string $password): bool
    {
        $result = $this->authenticator->auth($login, $password);

        if ($result instanceof Success) {
            return true;
        }

        return false;
    }
}
