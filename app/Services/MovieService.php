<?php

declare(strict_types=1);

namespace App\Services;

use App\Adapter\MovieAdapter\BarMovieAdapter;
use App\Adapter\MovieAdapter\BazMovieAdapter;
use App\Adapter\MovieAdapter\FooMovieAdapter;
use App\Composites\MovieAdapterCompositeInterface;
use Illuminate\Support\Facades\Cache;

class MovieService
{
    public function __construct(private MovieAdapterCompositeInterface $movieAdapterComposite)
    {
    }

    public function getTitlesFromApi(): array
    {
        $cacheKey = 'movie_titles';

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $this->addAdapters();
        $titles = $this->movieAdapterComposite->collectTitles();

        if (!empty($titles)) {
            Cache::put($cacheKey, $titles, now()->addHours(12));
        }

        return $titles ?? [];
    }

    private function addAdapters(): void
    {
        $this->movieAdapterComposite->addAdapter(new BarMovieAdapter(new \External\Bar\Movies\MovieService()));
        $this->movieAdapterComposite->addAdapter(new BazMovieAdapter(new \External\Baz\Movies\MovieService()));
        $this->movieAdapterComposite->addAdapter(new FooMovieAdapter(new \External\Foo\Movies\MovieService()));
    }
}
