<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        return [
            'title' => $this->faker->sentence(5),
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph(2),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'image' => fake()->imageUrl($width=400, $height=400),
        ];
    }
}
