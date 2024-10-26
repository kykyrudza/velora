<?php

// database/seeders/RecipeSeeder.php

namespace Database\Seeders;

use App\Models\Recipes;
use App\Models\Ingredients;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        $ingredients = Ingredients::all();

        Recipes::factory()
            ->count(40)
            ->create()
            ->each(function ($recipe) use ($ingredients) {
                $recipe->ingredients()->attach(
                    $ingredients->random(3)->pluck('id')->toArray()
                );
            });
    }
}
