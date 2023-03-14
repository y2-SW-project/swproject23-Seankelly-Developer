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

        foreach ($restaurants as $Restaurant) {
            Menu_Item::factory()->count(10)->create([
                'restaurant_id' => $Restaurant->id,
            ]);
        }
    }
}
