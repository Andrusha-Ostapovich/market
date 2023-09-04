<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(), 
            'user_id' => User::factory(), 
            'rating' => $this->faker->numberBetween(1, 5), 
            'comment' => $this->faker->paragraph, 

        ];
    }
}
