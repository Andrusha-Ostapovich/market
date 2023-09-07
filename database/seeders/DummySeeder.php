<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Attribute;
use App\Models\News;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class DummySeeder extends Seeder
{
    /**w
     * Run the database seeds.
     */
    public function run(): void
    {
        // News::factory(10)->create();
        // Category::factory(10)->create();
        // Attribute::factory(10)->create();
        //   Seller::factory(1)->create()->each(function(Seller $seller) {
           
        //       $products = Product::factory(rand(4, 10))->create([
        //           'seller_id' => $seller->id
        //       ]);
  
        //       // Створюємо категорії та пов'язуємо їх з продуктами
        //       $categories = Category::factory(rand(2, 5))->create();
        //       foreach ($products as $product) {
        //           $product->categories()->attach($categories->random());
        //       }
        //   });
  

}
}