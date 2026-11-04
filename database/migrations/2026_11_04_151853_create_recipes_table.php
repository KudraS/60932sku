<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->comment('Состав блюд: ингредиенты и их количество');

            $table->id()->comment('Идентификатор записи рецепта');

            $table->foreignId('dish_id')
                ->comment('Идентификатор блюда')
                ->constrained('dishes')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('ingredient_id')
                ->comment('Идентификатор ингредиента')
                ->constrained('ingredients')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->decimal('quantity', 10, 3)
                ->comment('Количество ингредиента в его единицах измерения');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};