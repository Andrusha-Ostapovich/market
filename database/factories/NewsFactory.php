<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
Use App\Models\News;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => Str::slug($this->faker->word, '-'),
            'content' => $this->faker->text,
            'publication_date'=>now(),
            
            
        ];
    }
    
    public function configure()
    {
        return $this->afterMaking(function (news $news) {
            //
        })->afterCreating(function (news $news) {

            // Media
            $news->addMediaFromUrl('https://picsum.photos/920/460')
                ->toMediaCollection('photo');
        });
    }
}
