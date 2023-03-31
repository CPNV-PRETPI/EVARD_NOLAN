<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    use HasFactory;

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'ingredients_compose_recipes')->withPivot('quantity');
    }

    public function plannings(): BelongsToMany
    {
        return $this->belongsToMany(Planning::class, 'recipes_compose_plannings')->using(PlanningRecipe::class)->withPivot(['planned_for', 'moment_of_meal']);
    }
}
