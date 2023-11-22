<?php

namespace App\Providers;

use App\Repositories\AuthenticationRepository;
use App\Repositories\BeritaRepository;
use App\Repositories\Interfaces\AuthenticationInterface;
use App\Repositories\Interfaces\BeritaIinterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            BeritaInterface::class,
            BeritaRepository::class
        );
        $this->app->bind(
            AuthenticationInterface::class,
            AuthenticationRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
