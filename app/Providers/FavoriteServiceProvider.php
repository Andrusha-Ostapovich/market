<?php

namespace App\Providers;

use App\Facades\Favorite;
use Illuminate\Support\ServiceProvider;

class FavoriteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton('favorite', function ($app) {
            return new Favorite();
        });
    }

    // ...



    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
