<?php

// database/factories/RecipeFactory.php

namespace Database\Factories;

use App\Models\Recipes;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipesFactory extends Factory
{
    protected $model = Recipes::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'cooking_time' => $this->faker->numberBetween(5, 60),
            'difficulty' => $this->faker->randomElement(['easy', 'medium', 'hard']),
            'image' => null,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

