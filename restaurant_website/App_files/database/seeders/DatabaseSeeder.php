<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LocationSeeder::class);
        $this->call(RestaurantSeeder::class);
        $this->call(MenuItemsTableSeeder::class);

        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            $restaurant->assignRandomImage();
        }
    }
}
