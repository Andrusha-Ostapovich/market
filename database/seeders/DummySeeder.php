<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Attribute;
use App\Models\News;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Seller;
use Database\Factories\OrderItemFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\StaticPage;

class DummySeeder extends Seeder
{
    /**w
     * Run the database seeds.
     */
    public function run(): void
    {
        // StaticPage::factory(10)->create();
        // Order::factory(10)->create();
        // OrderItem::factory(10)->create();
        // News::factory(10)->create();
        // Category::factory(10)->create();
        // Attribute::factory(10)->create();
        //   Seller::factory(3)->create()
        //   ->each(function(Seller $seller) {

        //       $products = Product::factory(rand(4, 10))->create([
        //           'seller_id' => $seller->id
        //       ]);

        //       // Створюємо категорії та пов'язуємо їх з продуктами
        //       $categories = Category::factory(rand(2, 5))->create();
        //       foreach ($products as $product) {
        //           $product->categories()->attach($categories->random());
        //       }
        //   })
        //   ;


    }
}
