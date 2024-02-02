<?php

declare(strict_types=1);

namespace App\Adapter\AuthAdapter;

use External\Foo\Auth\AuthWS;
use External\Foo\Exceptions\AuthenticationFailedException;

class FooAuthAdapter implements LoginAdapterInterface
{
    public function __construct(private AuthWS $authWS)
    {
    }

    public function auth(string $login, string $password): bool
    {
        try {
            $this->authWS->authenticate($login, $password);
            return true;
        } catch (AuthenticationFailedException $e) {
            return false;
        }
    }
}
