<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price_buy = $this->faker->numberBetween(100, 1000);
        return [
            'name' => fake()->word(),
            'price_buy' => $price_buy,
            'price_sell' => $price_buy + fake()->numberBetween(10, 20),
            'quantity' => fake()->numberBetween(1, 100),
            'rating' => fake()->numberBetween(10, 50)/10,
        ];
    }
}
