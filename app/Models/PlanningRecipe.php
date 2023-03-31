<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * This models is used in the many to many relationship
 * between recipe and planning tables as the pivot table model
 */
class PlanningRecipe extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Meal moments in French
     */
    public const meals = [
        1 => 'déjeuner',
        2=> 'dîner',
        3=> 'souper'
    ];

    /**
     * Mutates meal moment from id to the actual name and the opposite
     * @return Attribute
     */
    protected function momentOfMeal() : Attribute
    {
        return Attribute::make(
            get: fn (int $value) => ucfirst(self::meals[$value]),
            set: fn (string $value) => array_search(strtolower($value), self::meals),
        );
    }
}
