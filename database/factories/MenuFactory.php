<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
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
            'item_id'       => Item::inRandomOrder()->first()->id,
            'qty'           => rand(1, 5),
            'unit_price'    => rand(30, 100),
            'discount'      => rand(1, 5),
            'grand_total'   => rand(100, 500),
        ];
    }
}