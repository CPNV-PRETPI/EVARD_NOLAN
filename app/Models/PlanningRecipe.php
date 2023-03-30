<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PlanningRecipe extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public const meals = [
        1 => 'déjeuner',
        2=> 'dîner',
        3=> 'souper'
    ];
    protected function momentOfMeal() : Attribute
    {
        return Attribute::make(
            get: fn (int $value) => ucfirst(self::meals[$value]),
            set: fn (string $value) => array_search(strtolower($value), self::meals),
        );
    }
}
