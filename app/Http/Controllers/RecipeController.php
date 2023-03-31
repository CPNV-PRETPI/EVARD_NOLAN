<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function create()
    {
        $ingredient = new Ingredient();
        $ingredient->name = "Farine";
        $ingredient->save();

        $recipe = new Recipe();
        $recipe->title = "Pain";
        $recipe->save();

        $recipe->ingredients()->attach([
            1=>[
                'ingredient_id' => $ingredient->id,
                'quantity' => 200
            ]
        ]);


    }
}
