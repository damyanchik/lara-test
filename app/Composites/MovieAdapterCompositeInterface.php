<?php

declare(strict_types=1);

namespace App\Composites;

use App\Adapter\MovieAdapter\MovieAdapterInterface;

interface MovieAdapterCompositeInterface
{
    public function addAdapter(MovieAdapterInterface $adapter): void;
    public function collectTitles(): array;
}
