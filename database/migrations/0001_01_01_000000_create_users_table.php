<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            // Начало ID с 1000
            $table->id()->from(1000);

            // Ограничение на длину, обязательно, collation для поддержки эмодзи
            $table->string('firstName', 50)
                ->nullable(false);

            // Ограничение на длину, обязательно
            $table->string('lastName', 50)
                ->nullable(false);

            // Поле может быть пустым, дефолтное значение
            $table->string('description', 255)
                ->nullable()
                ->default('No description provided');

            // Уникальный email, с ограничением длины
            $table->string('email', 100)
                ->unique()
                ->nullable(false);

            // Поле может быть пустым, дефолтное изображение
            $table->string('avatar', 255)
                ->nullable()
                ->default('default_avatar.png');

            // Обязательно для хранения пароля (зашифрованного)
            $table->string('password', 255)
                ->nullable(false);

            // Токен для запоминания пользователя
            $table->rememberToken();

            // Метки времени создания и обновления
            $table->timestamps();
        });



        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
