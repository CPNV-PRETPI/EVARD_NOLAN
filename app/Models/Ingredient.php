<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    public $timestamps = false;
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'ingredients_compose_recipes')->withPivot('quantity');
    }
}
