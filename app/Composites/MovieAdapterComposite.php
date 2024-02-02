<?php

declare(strict_types=1);

namespace App\Composites;

use App\Adapter\MovieAdapter\MovieAdapterInterface;
use Illuminate\Support\Facades\Log;

class MovieAdapterComposite implements MovieAdapterCompositeInterface
{
    protected array $adapters = [];

    public function addAdapter(MovieAdapterInterface $adapter): void
    {
        $this->adapters[] = $adapter;
    }

    public function collectTitles(): array
    {
        $allTitles = [];

        foreach ($this->adapters as $adapter) {
            $titles = $this->getTitlesWithRetries($adapter);
            $allTitles = array_merge($allTitles, $titles);
        }

        return $allTitles;
    }

    private function getTitlesWithRetries(MovieAdapterInterface $adapter): array
    {
        $maxRetries = 3;
        $retryCount = 0;

        do {
            $titles = $adapter->getTitles();

            if (!empty($titles)) {
                break;
            }

            Log::error('MovieService unavailable (' . get_class($adapter) . ')');

            $retryCount++;
            usleep(500000);

        } while ($retryCount < $maxRetries);

        return $titles;

    }
}
