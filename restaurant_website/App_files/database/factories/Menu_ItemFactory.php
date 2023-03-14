<?php

namespace Database\Factories;

use App\Models\Menu_Item;
use App\Models\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class Menu_ItemFactory extends Factory
{
    protected $model = Menu_Item::class;

    public function definition()
    {
        return [
            'restaurant_id' => function () {
                return Restaurant::all()->random()->id;
            },
            'item_name' => $this->faker->sentence(),
            'item_description' => $this->faker->paragraph(),
            'item_price' => $this->faker->randomFloat(2, 5, 50),
        ];
    }
}
