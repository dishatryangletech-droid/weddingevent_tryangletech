<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_recommended_portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed initial recommended portfolio items from master
        DB::table('home_recommended_portfolios')->insert([
            [
                'title' => 'Jennifer & Oliver',
                'description' => 'Romantic Botanical Garden Celebration',
                'icon' => 'images/6a6305bf5040b777232a182a_Event-image-two-one.avif',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Briana & Richard',
                'description' => 'Ethereal Country Estate Romance',
                'icon' => 'images/6a6305bf5040b777232a1836_Event-image-two.avif',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Anne & Cameron',
                'description' => 'Modern Minimalist Villa Affair',
                'icon' => 'images/6a6305bf5040b777232a1839_Event-image-four.avif',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_recommended_portfolios');
    }
};
