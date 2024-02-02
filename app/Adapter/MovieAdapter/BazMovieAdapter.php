<?php

declare(strict_types=1);

namespace App\Adapter\MovieAdapter;

use External\Baz\Movies\MovieService;

class BazMovieAdapter implements MovieAdapterInterface
{
    public function __construct(private MovieService $movieService)
    {
    }

    public function getTitles(): array
    {
        try {
            $movieData = $this->movieService->getTitles();

            return $movieData['titles'];
        } catch (\Exception $e) {
            return [];
        }
    }
}
