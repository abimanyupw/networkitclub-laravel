<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'course_id' => fake()->numberBetween(1, 3),
            'category_id' => fake()->numberBetween(1, 3),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->sentence(),
            'content' => fake()->paragraph(),
        ];
    }
}