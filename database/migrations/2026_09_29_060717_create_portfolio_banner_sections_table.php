<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_banner_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->nullable()->default('Portfolio');
            $table->string('title')->default('Event design to make your heart skip a beat');
            $table->text('description')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_banner_sections');
    }
};
