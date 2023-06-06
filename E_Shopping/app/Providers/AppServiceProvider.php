<?php

namespace App\Providers;

use App\Repositories\Product\ProductRepositories;
use App\Repositories\Product\ProductRepositoriesInterFace;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}