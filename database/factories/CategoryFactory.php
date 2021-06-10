<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_name = ucfirst($this->faker->word);
        return [
            'name' => $category_name,
            'preview_image' => $this->faker->image('public/images', 690, 690, strtoupper($category_name), false, false, null, true),
            'created_at' => $this->faker->dateTimeBetween('-3 months') //   между 3 месяцами назад и до сегодня
        ];
    }
}
