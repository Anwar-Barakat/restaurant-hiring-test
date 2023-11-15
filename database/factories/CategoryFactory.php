<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id'         => 0,
            'name'              => fake()->word(3),
            'url'               => fake()->slug(),
            'discount'          => fake()->numberBetween(1, 5),
            'description'       => fake()->paragraph(2),
            'meta_title'        => fake()->sentence(1),
            'meta_description'  => fake()->paragraph(2),
            'meta_keywords'     => fake()->sentence(2),
        ];
    }
}
