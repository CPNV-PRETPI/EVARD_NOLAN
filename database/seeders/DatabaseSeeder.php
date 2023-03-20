<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ingredient;
use App\Models\Planning;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $recipes = Recipe::factory()
            ->count(3)
            ->hasAttached(
                Ingredient::factory()->count(3),
                ['quantity' => 500]
            )
            ->create();
        foreach ($recipes as $recipe){
            Planning::factory()
                ->for($recipe)
                ->create();
        }

    }
}
