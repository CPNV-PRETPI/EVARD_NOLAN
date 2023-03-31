<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ingredient;
use App\Models\Planning;
use App\Models\PlanningRecipe;
use App\Models\Recipe;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*Planning::factory(5)->create()->each(function ($planning){
            Recipe::factory(5)->create()->each(function($recipe){

            });
        });*/

        $plannings = Planning::factory()->count(5)->create();

        foreach ($plannings as $planning)
        {
            $recipes = Recipe::factory()->count(5)->create();
            foreach ($recipes as $key=>$recipe)
            {
                $ingredients = Ingredient::factory()->count(3)->create();
                foreach ($ingredients as $ingredient)
                {
                    $recipe->ingredients()->attach(
                        $ingredient->id,
                        ['quantity' => rand(50,1000)]
                    );
                }
                $planning->recipes()->attach(
                    $recipe->id,
                    [
                        'planned_for' => Carbon::now()->setISODate($planning->year, $planning->weeknumber,$key+1),
                        'moment_of_meal' => PlanningRecipe::meals[rand(1,3)]
                    ]
                );
            }
        }

    }
}
