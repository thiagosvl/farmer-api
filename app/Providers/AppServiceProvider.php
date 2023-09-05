<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\FarmerRepositoryInterface;
use App\Repositories\EloquentFarmerRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FarmerRepositoryInterface::class, EloquentFarmerRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
