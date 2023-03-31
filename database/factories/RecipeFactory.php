<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Recipe' . fake()->unique()->randomNumber(),
            'instructions' => fake()->text(),
            'preparation_time' => fake()->randomNumber(1, true),
            'nb_of_people' => fake()->randomNumber(1, true)
        ];
    }
}
