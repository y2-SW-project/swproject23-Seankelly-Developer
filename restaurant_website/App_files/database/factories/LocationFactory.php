<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition()
    {
        return [
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip_code' => $this->faker->postcode,
            'latitude' => $this->faker->latitude(51.4, 55.4), // set latitude within Ireland's bounds
            'longitude' => $this->faker->longitude(-10.5, -6.5), // set longitude within Ireland's bounds
        ];
    }
}
