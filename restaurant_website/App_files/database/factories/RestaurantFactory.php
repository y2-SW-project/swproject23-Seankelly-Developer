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
            'name' => $this->faker->randomElement([
                "The Hungry Bear",
                "La Bella Vita",
                "The Green Garden",
                "The Blue Plate",
                "Golden Dragon",
                "The Red Lion",
                "The White Horse",
                "The Rusty Spoon",
                "Bella Luna",
                "The Yellow Submarine",
                "The Copper Pot",
                "The Purple Cow",
                "The Black Sheep",
                "The Pink Flamingo",
                "The Golden Rooster",
                "The Silver Spoon",
                "The Green Apple",
                "The Red Pepper",
                "The Blueberry Café",
                "The Orange Grove",
                "The Olive Tree",
                "The Lemon Tree",
                "The Grapevine",
                "The Peach Pit",
                "The Cherry Blossom",
                "The Raspberry Room",
                "The Strawberry Patch",
                "The Pineapple Hut",
                "The Mango Tree",
                "The Coconut Grove",
                "The Kiwi Kitchen",
                "The Avocado Cafe",
                "The Papaya Palace",
                "The Banana Boat",
                "The Grapefruit Grill",
                "The Fig Tree",
                "The Pomegranate Place",
                "The Watermelon Shack",
                "The Carrot Patch",
                "The Artichoke House",
                "The Beet Box",
                "The Brussels Sprout",
                "The Cauliflower Castle",
                "The Celery Garden",
                "The Cucumber Cove",
                "The Eggplant Emporium",
                "The Garlic Grove",
                "The Kale Kingdom",
                "The Leek Lounge",
                "The Mushroom Mansion",
                "The Onion Orchard",
                "The Pea Pod",
                "The Potato Place"
            ]),
            'cuisine' => $this->faker->randomElement(
                ['Italian', 'Japanese', 'Mexican', 'Thai', 'Indian', 'Greek', 'French', 'Chinese', 'Korean', 'Vietnamese', 'Mediterranean', 'Brazilian', 'Spanish', 'Turkish', 'Moroccan', 'Peruvian', 'Lebanese', 'Ethiopian', 'Cajun', 'Caribbean']
            ),
            'county' => $this->faker->randomElement(['Carlow', 'Cavan', 'Clare', 'Cork', 'Donegal', 'Dublin', 'Galway', 'Kerry', 'Kildare', 'Kilkenny', 'Laois', 'Leitrim', 'Limerick', 'Longford', 'Louth', 'Mayo', 'Meath', 'Monaghan', 'Offaly', 'Roscommon', 'Sligo', 'Tipperary', 'Waterford', 'Westmeath', 'Wexford', 'Wicklow']),
            'rating' => $this->faker->numberBetween(1, 5),
            'bio' => $this->faker->text,
            'Price_range' => $this->faker->numberBetween(1, 5),
        ];
    }
}
