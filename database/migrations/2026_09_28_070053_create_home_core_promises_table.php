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
        Schema::create('home_core_promises', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable();
            $table->string('title')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('image')->nullable();
            
            for ($i = 1; $i <= 3; $i++) {
                $table->string("item_{$i}_title")->nullable();
                $table->text("item_{$i}_desc")->nullable();
            }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_core_promises');
    }
};
