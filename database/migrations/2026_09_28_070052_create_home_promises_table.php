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
        Schema::create('home_promises', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable();
            $table->string('title')->nullable();
            
            for ($i = 1; $i <= 3; $i++) {
                $table->string("card_{$i}_tagline")->nullable();
                $table->string("card_{$i}_title")->nullable();
                $table->text("card_{$i}_desc")->nullable();
                $table->string("card_{$i}_image")->nullable();
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_promises');
    }
};
