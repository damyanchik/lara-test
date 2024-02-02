<?php

declare(strict_types=1);

namespace App\Adapter\MovieAdapter;

use External\Bar\Movies\MovieService;

class BarMovieAdapter implements MovieAdapterInterface
{
    public function __construct(private MovieService $movieService)
    {
    }

    public function getTitles(): array
    {
        try {
            $moviesData = $this->movieService->getTitles();

            return data_get($moviesData, 'titles.*.title');
        } catch (\Exception $e) {
            return [];
        }
    }
}
