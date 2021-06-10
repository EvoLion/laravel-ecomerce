<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsCount = (int)$this->command->ask('How many posts would you like?', 120);
        $categories = Category::all();

        Product::factory($productsCount)->make()->each(function($product) use ($categories) { 
            $faker = Factory::create();
            $product->category_id = $categories->random()->id;
            $category = Category::where('id', $product->category_id)->first();

            $product->preview_image = $faker->image('public/images', 690, 690,  strtoupper($category->name), false, false, $product->name, true);
            $product->save();
        });
    }
}
