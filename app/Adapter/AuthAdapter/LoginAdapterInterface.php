<?php

declare(strict_types=1);

namespace App\Adapter\AuthAdapter;

interface LoginAdapterInterface
{
    public function auth(string $login, string $password): bool;
}
