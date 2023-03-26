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

    public $guarded = [];

    public const meals = [
        1 => 'breakfast',
        2=> 'lunch',
        3=> 'diner'
    ];
    protected function momentOfMeal() : Attribute
    {
        return Attribute::make(
            get: fn (int $value) => ucfirst(self::meals[$value]),
            set: fn (string $value) => array_search(strtolower($value), self::meals),
        );
    }
}
