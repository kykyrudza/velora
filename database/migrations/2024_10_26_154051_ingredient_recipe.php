<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ingredient_recipe', function (Blueprint $table) {
            // Автоматически увеличиваемый ID для записи в таблице
            $table->id();

            // Внешний ключ на таблицу recipes, удаление ингредиентов при удалении рецепта
            $table->foreignId('recipe_id')
                ->constrained() // Создание внешнего ключа
                ->onDelete('cascade'); // Удаление всех связанных записей при удалении рецепта

            // Внешний ключ на таблицу ingredients, удаление связей при удалении ингредиента
            $table->foreignId('ingredient_id')
                ->constrained() // Создание внешнего ключа
                ->onDelete('cascade'); // Удаление всех связанных записей при удалении ингредиента

            // Timestamps для отслеживания времени создания и обновления
            $table->timestamps(); // Метки времени создания и обновления
        });


    }
    public function down(): void
    {
        Schema::dropIfExists('ingredient_recipe');
    }
};

