<?php

namespace Database\Seeders;

use App\Models\Menu_Item;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            Menu_Item::factory()->times(10)->create([
                'restaurant_id' => $restaurant->id,
            ]);
        }
    }
}
