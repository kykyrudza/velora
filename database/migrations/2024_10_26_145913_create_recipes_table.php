<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            // Автоматически увеличиваемый ID
            $table->id();

            // Ограничение на длину, обязательно, поддержка UTF-8
            $table->string('name', 100)
                ->nullable(false);

            // Обязательно, поддержка UTF-8
            $table->text('description')
                ->nullable(false); // Подробное описание рецепта

            // Положительное число, может быть пустым, по умолчанию 0
            $table->integer('cooking_time')
                ->unsigned()
                ->nullable()
                ->default(0); // Время приготовления в минутах

            // Ограниченный набор значений для уровня сложности
            $table->enum('difficulty', ['easy', 'medium', 'hard'])
                ->nullable()
                ->default('easy'); // Уровень сложности рецепта, по умолчанию 'easy'

            // Поле для хранения пути к изображению, может быть пустым
            $table->string('image', 255)
                ->nullable(); // URL изображения рецепта

            // Внешний ключ на пользователя, который создал рецепт
            $table->foreignId('user_id')
                ->constrained() // Создание внешнего ключа
                ->onDelete('cascade'); // Удаление всех рецептов при удалении пользователя

            // Тimestamps для отслеживания времени создания и обновления
            $table->timestamps(); // Метки времени создания и обновления
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
