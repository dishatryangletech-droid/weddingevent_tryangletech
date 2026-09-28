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
        Schema::create('home_service_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable();
            $table->string('title')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->timestamps();
        });

        Schema::create('home_service_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('home_philosophy_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->integer('review_stars')->default(5);
            $table->text('review_text')->nullable();
            $table->string('review_author')->nullable();
            $table->string('review_author_subtitle')->nullable();
            $table->string('review_author_image')->nullable();
            $table->timestamps();
        });

        Schema::create('home_philosophy_items', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_philosophy_items');
        Schema::dropIfExists('home_philosophy_sections');
        Schema::dropIfExists('home_service_cards');
        Schema::dropIfExists('home_service_sections');
    }
};
