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
        Schema::create('home_portfolio_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable()->default('PORTFOLIO');
            $table->string('title')->nullable()->default('Event design to make your heart skip a beat');
            $table->string('button_text')->nullable()->default('EXPLORE ENTIRE PORTFOLIO GALLERY →');
            $table->string('button_link')->nullable()->default('/portfolio');
            $table->timestamps();
        });

        DB::table('home_portfolio_sections')->insert([
            'tagline' => 'PORTFOLIO',
            'title' => 'Event design to make your heart skip a beat',
            'button_text' => 'EXPLORE ENTIRE PORTFOLIO GALLERY →',
            'button_link' => '/portfolio',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_portfolio_sections');
    }
};
