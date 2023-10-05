<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [
            'cart_id' => $this->faker->numberBetween(1, 10),
            'total_amount' => $this->faker->randomFloat(2, 5, 100),
            'status' => $this->faker->randomElement(['pending', 'processed', 'shipped', 'delivered']),
            'created_at' => now(),
        ];
    }
}
