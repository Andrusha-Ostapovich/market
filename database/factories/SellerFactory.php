<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Seller;

class SellerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seller::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $userId = 0; // Початкове значення для user_id

        return [
            'user_id' => $userId++,
            'store_name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'contact_info' => $this->faker->address,
        ];
    }
    //
}
