<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('food_id')->constrained('foods')->onDelete('cascade');  // pastikan tabel foods, bukan food
    $table->string('history_type');
    $table->timestamps();
});
    }

    public function down()
    {
        Schema::dropIfExists('histories');
    }
}