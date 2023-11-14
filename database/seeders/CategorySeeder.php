<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     *
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $categories = [
            [
                'id'                => 1,
                'parent_id'         => 0,
                'name'              => 'Seafood',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Seafood', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'id'                => 2,
                'parent_id'         => 0,
                'name'              => 'Meat',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Meat', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'id'                => 3,
                'parent_id'         => 0,
                'name'              => 'Vegetables',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Vegetables', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'parent_id'         => 1,
                'name'              => 'Fish',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Fish', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'parent_id'         => 1,
                'name'              => 'Shrimp',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Shrimp', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'parent_id'         => 1,
                'name'              => 'Salmon',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Salmon', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'parent_id'         => 2,
                'name'              => 'Beef',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Beef', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'parent_id'         => 2,
                'name'              => 'Chicken',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Chicken', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'parent_id'         => 2,
                'name'              => 'Lamb',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Lamb', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
            [
                'parent_id'         => 3,
                'name'              => 'Leafy vegetables',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Leafy vegetables', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'parent_id'         => 3,
                'name'              => 'Root vegetables',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Root vegetables', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            [
                'parent_id'         => 3,
                'name'              => 'Fruit vegetables',
                'discount'          => rand(1, 3),
                'description'       => $faker->sentence(130),
                'url'               => Str::slug('Fruit vegetables', '-'),
                'meta_title'        => $faker->words(3, true),
                'meta_description'  => $faker->sentence(50),
                'meta_keywords'     => $faker->sentence(15),
            ],
            // ____________
        ];

        foreach ($categories as $category) {
            if (is_null(Category::where('url', $category['url'])->first()))
                Category::create($category);
        }
    }
}
