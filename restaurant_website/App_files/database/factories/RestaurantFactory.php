<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->title,
            'cuisine' => $this->faker->text,
            'county' => $this->faker->text,
            'rating' => $this->faker->numberBetween(1, 5),
            'bio' => $this->faker->text,
            'Price-range' => $this->faker->numberBetween(1, 5),
        ];
    }
}
