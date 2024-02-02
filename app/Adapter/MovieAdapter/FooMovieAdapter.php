<?php

declare(strict_types=1);

namespace App\Adapter\MovieAdapter;

use External\Foo\Movies\MovieService;

class FooMovieAdapter implements MovieAdapterInterface
{
    public function __construct(private MovieService $movieService)
    {
    }

    public function getTitles(): array
    {
        try {
            return $this->movieService->getTitles();
        } catch (\Exception $e) {
            return [];
        }
    }
}
