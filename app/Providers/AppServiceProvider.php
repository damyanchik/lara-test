<?php

namespace App\Providers;

use App\Composites\MovieAdapterComposite;
use App\Composites\MovieAdapterCompositeInterface;
use App\Factories\AuthAdapterFactory;
use App\Factories\AuthAdapterFactoryInterface;
use App\Services\AuthService;
use App\Services\MovieService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthAdapterFactoryInterface::class, AuthAdapterFactory::class);
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthService($app->make(AuthAdapterFactoryInterface::class));
        });

        $this->app->bind(MovieAdapterCompositeInterface::class, MovieAdapterComposite::class);
        $this->app->bind(MovieService::class, function ($app) {
            return new MovieService($app->make(MovieAdapterCompositeInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
