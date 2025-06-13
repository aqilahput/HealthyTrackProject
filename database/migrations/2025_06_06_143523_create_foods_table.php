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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('calories')->nullable();
            $table->float('fat')->nullable();
            $table->float('protein')->nullable();
            $table->float('carbohydrate')->nullable();
            $table->integer('cooking_time')->nullable();
            $table->text('ingredients')->nullable();
            $table->text('steps')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                column: 'id',
                indexName: 'categories_food_id'
            )->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};