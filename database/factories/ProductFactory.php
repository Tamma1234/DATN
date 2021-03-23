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
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'images' => $this->faker->imageUrl($width = 640, $height = 480),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(50000,100000),
            'sale_percent' => $this->faker->numberBetween(0,100),
            'stocks' => $this->faker->numberBetween(0,1),
            'is_active' => $this->faker->numberBetween(0,1),
        ];
    }
}
