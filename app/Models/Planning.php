<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Planning extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'recipes_compose_plannings')->using(PlanningRecipe::class)->withPivot(['planned_for', 'moment_of_meal']);
    }
}
