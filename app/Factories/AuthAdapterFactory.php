<?php

declare(strict_types=1);

namespace App\Factories;

use App\Adapter\AuthAdapter\BarAuthAdapter;
use App\Adapter\AuthAdapter\BazAuthAdapter;
use App\Adapter\AuthAdapter\FooAuthAdapter;
use App\Adapter\AuthAdapter\LoginAdapterInterface;
use App\Enum\CompanyTagEnum;
use External\Bar\Auth\LoginService;
use External\Baz\Auth\Authenticator;
use External\Foo\Auth\AuthWS;

class AuthAdapterFactory implements AuthAdapterFactoryInterface
{
    public function createAdapter(string $company): ?LoginAdapterInterface
    {
        return match ($company) {
            CompanyTagEnum::BAR => new BarAuthAdapter(new LoginService()),
            CompanyTagEnum::BAZ => new BazAuthAdapter(new Authenticator),
            CompanyTagEnum::FOO => new FooAuthAdapter(new AuthWS()),
            default => CompanyTagEnum::NONE
        };
    }
}
