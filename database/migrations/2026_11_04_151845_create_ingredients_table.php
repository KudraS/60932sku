<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->comment('Ингредиенты блюд');

            $table->id()->comment('Идентификатор ингредиента');
            $table->string('name', 100)
                ->comment('Наименование ингредиента');
            $table->string('unit', 20)
                ->comment('Единица измерения: г, мл, шт.');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};