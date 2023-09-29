<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use NavigationComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot()
    {
        Relation::enforceMorphMap([
            'product' => Product::class,
            'article' => Article::class,
            'user' => User::class,
        ]);
    }
}
