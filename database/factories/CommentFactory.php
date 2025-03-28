<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Creates a new user if needed, or use an existing one
            'product_id' => Product::factory(), // Creates a new product if needed, or use an existing one
            'author' => fake()->name(), // Optional author name, can be null
            'comment' => fake()->paragraph(), // Generate a paragraph for the comment
        ];
    }
}
