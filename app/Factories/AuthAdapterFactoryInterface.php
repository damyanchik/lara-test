<?php

declare(strict_types=1);

namespace App\Factories;

use App\Adapter\AuthAdapter\LoginAdapterInterface;

interface AuthAdapterFactoryInterface
{
    public function createAdapter(string $company): ?LoginAdapterInterface;
}
