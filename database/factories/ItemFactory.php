<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'       => Category::inRandomOrder()->first()->id,
            'name'              => fake()->title(),
            'price'             => rand(10, 100),
            'discount'          => rand(1, 4),
            'description'       => fake()->sentence(120),
            'meta_title'        => fake()->sentence(3),
            'meta_description'  => fake()->sentence(10),
            'meta_keywords'     => fake()->sentence(5),
            'is_featured'       => rand(0, 1),
            'is_best_seller'    => rand(0, 1),
        ];
    }
}