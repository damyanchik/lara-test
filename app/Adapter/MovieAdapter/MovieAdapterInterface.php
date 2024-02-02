<?php

declare(strict_types=1);

namespace App\Adapter\MovieAdapter;

interface MovieAdapterInterface
{
    public function getTitles(): array;
}
