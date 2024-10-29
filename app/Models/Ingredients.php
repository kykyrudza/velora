<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredients extends Model
{
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipes::class, 'ingredient_recipe', 'ingredient_id', 'recipe_id');
    }

}
