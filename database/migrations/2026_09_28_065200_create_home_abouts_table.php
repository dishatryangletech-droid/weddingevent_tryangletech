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
        Schema::create('home_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image_left')->nullable();
            $table->string('image_right')->nullable();
            $table->string('service_1')->nullable();
            $table->string('service_2')->nullable();
            $table->string('service_3')->nullable();
            $table->integer('stat_number')->nullable();
            $table->string('stat_symbol')->nullable();
            $table->string('stat_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_abouts');
    }
};
