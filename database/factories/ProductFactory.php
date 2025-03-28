<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'prod_name' => fake()->company(), // You can change this to something more product-related if needed, like fake()->word() or fake()->unique()->word()
            'prod_desc' => fake()->text(), // Generates a paragraph of text
            'price' => fake()->randomFloat(2, 10, 1000), // Generates a random float with 2 decimal places between 10 and 1000
            'shipping_info' => fake()->realText(45), // Generates a realistic text of 45 characters
            'img_url' => fake()->imageUrl(640, 480, 'products', true, 'Faker', true), // Generates a URL to a random image
        ];
    }
}
