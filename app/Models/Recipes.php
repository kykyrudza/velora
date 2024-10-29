<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'cooking_time',
        'difficulty',
        'image',
        'user_id',
    ];

    public function user() :belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredients::class, 'ingredient_recipe', 'recipe_id', 'ingredient_id');
    }

}
