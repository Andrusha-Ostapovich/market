<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Attribute;
use App\Models\Article;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;

class DummySeeder extends Seeder
{
    /**
     * Наповнення всіх потребуючих таблиць випадковими данними та створення статичних сторінок
     */
    public function run(): void
    {
        Page::create([
            'name' => 'Головна',
            'content' => 'Вітаємо на сайті',
            'slug' => 'home',
            'template' => 'home',
        ]);
        Page::create([
            'name' => 'Про нас',
            'content' => 'Українці — слов\'янський народ, основне й автохтонне населення України, найбільша етнічна спільнота на її території. Як етнос сформувався на землях сучасної України та частин суміжних земель сучасних: Польщі, Білорусі, Молдови, Румунії, Угорщини, Словаччини.',
            'slug' => 'about',
            'template' => 'about',
        ]);
        Page::create([
            'name' => 'Контакти',
            'content' => 'Наші контакти',
            'slug' => 'contacts',
            'template' => 'contacts',
        ]);
        User::factory(10)->create();
        Category::factory(10)->create();
        Attribute::factory(10)->create();
        Seller::factory(10)->create()
            ->each(function (Seller $seller) {
                $products = Product::factory(rand(4, 10))
                    ->create(['seller_id' => $seller->id]);
            });
        Review::factory(10)->create();
        Order::factory(10)->create();
        Article::factory(10)->create();
    }
}
