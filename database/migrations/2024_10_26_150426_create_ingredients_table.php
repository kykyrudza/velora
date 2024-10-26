<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table) {
            // Автоматически увеличиваемый ID
            $table->id();

            // Ограничение на длину, обязательно, уникальное название ингредиента
            $table->string('name', 100) // Ограничение до 100 символов
            ->nullable(false) // Поле обязательно для заполнения
            ->unique(); // Уникальное название ингредиента

            // Тimestamps для отслеживания времени создания и обновления
            $table->timestamps(); // Метки времени создания и обновления
        });

    }
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
