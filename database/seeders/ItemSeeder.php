<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $chicken            = Category::select('id')->where('url', 'chicken')->first();
        $meat               = Category::select('id')->where('url', 'meat')->first();
        $leafyVegetables    = Category::select('id')->where('url', 'leafy-vegetables')->first();

        $items              = [
            [
                'category_id'       => $chicken->id,
                'name'              => 'Roasted chicken',
                'price'             => rand(10, 100),
                'discount'          => rand(1, 4),
                'description'       => $faker->sentence(120),
                'meta_title'        => $faker->sentence(3),
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 1,
                'is_best_seller'    => true,
            ],
            [
                'category_id'       => $chicken->id,
                'name'              => 'Grilled chicken',
                'price'             => rand(230, 260),
                'discount'          => rand(1, 4),
                'description'       => $faker->sentence(120),
                'meta_title'        => $faker->sentence(3),
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 1,
                'is_best_seller'    => true,
            ],
            [
                'category_id'       => $meat->id,
                'name'              => 'Grilled steak',
                'price'             => rand(450, 500),
                'discount'          => rand(1, 4),
                'description'       => $faker->sentence(120),
                'meta_title'        => $faker->sentence(3),
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 1,
                'is_best_seller'    => true,
            ],
            [
                'category_id'       => $meat->id,
                'name'              => 'Kebab',
                'price'             => rand(380, 420),
                'discount'          => rand(1, 4),
                'description'       => $faker->sentence(120),
                'meta_title'        => $faker->sentence(3),
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 1,
                'is_best_seller'    => true,
            ],
            [
                'category_id'       => $leafyVegetables->id,
                'name'              => 'Green salad',
                'price'             => rand(450, 500),
                'discount'          => rand(1, 4),
                'description'       => $faker->sentence(120),
                'meta_title'        => $faker->sentence(3),
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'category_id'       => $leafyVegetables->id,
                'name'              => 'Fruit salad',
                'price'             => rand(450, 500),
                'discount'          => rand(1, 4),
                'description'       => $faker->sentence(120),
                'meta_title'        => $faker->sentence(3),
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'category_id'       => $leafyVegetables->id,
                'name'              => 'Vegetable soup',
                'price'             => rand(450, 500),
                'discount'          => rand(1, 4),
                'description'       => $faker->sentence(120),
                'meta_title'        => $faker->sentence(3),
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'category_id'       => $leafyVegetables->id,
                'name'              => 'Lentil soup',
                'price'             => rand(450, 500),
                'discount'          => rand(1, 4),
                'description'       => $faker->sentence(120),
                'meta_title'        => $faker->sentence(3),
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'category_id'       => $leafyVegetables->id,
                'name'              => 'Roasted vegetable platter',
                'price'             => rand(18, 25),
                'discount'          => rand(1, 4),
                'description'       => $faker->sentence(120),
                'meta_title'        => $faker->sentence(3),
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
            [
                'category_id'       => $meat->id,
                'name'              => 'Grilled lamb',
                'price'             => rand(25, 30),
                'discount'          => rand(1, 4),
                'description'       => $faker->sentence(120),
                'meta_title'        => $faker->sentence(3),
                'meta_description'  => $faker->sentence(10),
                'meta_keywords'     => $faker->sentence(5),
                'is_featured'       => 0,
                'is_best_seller'    => true,
            ],
        ];
        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
