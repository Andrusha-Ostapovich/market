<?php

namespace App\Providers;

use App\Facades\Cart;
use App\Models\Article;
use App\Models\Page;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton('cart', function ($app) {
            return new Cart();
        });
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
            'review' => Review::class,
            'page' => Page::class,
        ]);
    }
}
