<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => strtoupper($this->faker->bothify($this->faker->words($this->faker->numberBetween(1, 2), true) . ' ?#')),
            'description' => $this->faker->text,
            // 'preview_image' => $this->faker->image('public/images', 690, 690, 'technics', false),
            'price' => $this->faker->randomFloat(2, 40, 1000),
            'sale_price' => $this->faker->optional($weight = 70)->randomFloat(2, 40, 1000),
            'stock' => $this->faker->randomDigitNotNull,
            'created_at' => $this->faker->dateTimeBetween('-3 months') //   между 3 месяцами назад и до сегодня
        ];
    }
}
