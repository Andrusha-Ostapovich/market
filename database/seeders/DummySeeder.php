<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Attribut;
use App\Models\News;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**w
     * Run the database seeds.
     */
    public function run(): void
    {
        
    //    News::factory(10)->create();
        Seller::factory(5)->create()->each(function(Seller $seller) {
            Product::factory(rand(4, 10))->create([
                'seller_id' => $seller->id
            ]);


            
        });
    }
}
