<?php

namespace Database\Factories;

use Carbon\Carbon;
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
            'weeknumber' => Carbon::now()->addWeeks(fake()->unique()->numberBetween(0, 30))->weekOfYear,
            'year' => Carbon::now()->year
        ];
    }
}
