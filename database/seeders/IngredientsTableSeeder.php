<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredients;

class IngredientsTableSeeder extends Seeder
{
    public function run(): void
    {
        Ingredients::create(['name' => 'Соль']);
        Ingredients::create(['name' => 'Перец']);
        Ingredients::create(['name' => 'Морковь']);
        Ingredients::create(['name' => 'Лук']);
        Ingredients::create(['name' => 'Чеснок']);
        Ingredients::create(['name' => 'Томаты']);
        Ingredients::create(['name' => 'Курица']);
    }
}
