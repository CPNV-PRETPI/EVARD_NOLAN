<?php

namespace Database\Factories;

use Faker\Core\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Planning>
 */
class PlanningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'planned_for' => fake()->date('Y-m-d H:i:s', '+3 weeks'),
            'moment_of_meal' => fake()->randomElement(['matin', 'midi', 'soir']),
        ];
    }
}
