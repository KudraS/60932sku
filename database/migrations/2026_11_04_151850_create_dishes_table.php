<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->comment('Блюда и способы их приготовления');

            $table->id()->comment('Идентификатор блюда');

            $table->foreignId('category_id')
                ->comment('Идентификатор категории блюда')
                ->constrained('categories')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->string('name', 150)
                ->comment('Наименование блюда');
            $table->text('cooking_method')
                ->comment('Способ приготовления блюда');
            $table->unsignedInteger('cooking_time')
                ->comment('Время приготовления в минутах');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};