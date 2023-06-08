<?php

namespace App\Providers;

use App\Repositories\Product\ProductRepositories;
use App\Repositories\Product\ProductRepositoriesInterFace;
use App\Service\Product\ProductService;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(
            ProductRepositoriesInterFace::class,
            ProductRepositories::class
        );

        $this->app->singleton(
            ProductServiceInterface::class,
            ProductService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
