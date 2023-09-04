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
    $sellerUser = User::where('role', 'seller')->inRandomOrder()->first();

    return [
      'user_id' => $sellerUser->id,
      'store_name' => $this->faker->company,
      'description' => $this->faker->paragraph,
      'contact_info' => $this->faker->address,
    ];
  }
}
