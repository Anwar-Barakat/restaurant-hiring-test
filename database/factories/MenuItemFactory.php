<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'       => User::inRandomOrder()->first()->id,
            'menu_id'       => Menu::inRandomOrder()->first()->id,
            'item_id'    => Item::inRandomOrder()->first()->id,
            'qty'           => rand(1, 5),
            'total'         => rand(100, 500),
        ];
    }
}
