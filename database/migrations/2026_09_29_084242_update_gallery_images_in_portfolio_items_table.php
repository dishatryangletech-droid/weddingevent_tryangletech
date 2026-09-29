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
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->dropColumn([
                'gallery_image_1',
                'gallery_image_2',
                'gallery_image_3',
                'gallery_image_4',
                'gallery_image_5',
                'gallery_image_6'
            ]);
            
            $table->json('gallery_images')->nullable()->after('gallery_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->dropColumn('gallery_images');
            
            $table->string('gallery_image_1')->nullable();
            $table->string('gallery_image_2')->nullable();
            $table->string('gallery_image_3')->nullable();
            $table->string('gallery_image_4')->nullable();
            $table->string('gallery_image_5')->nullable();
            $table->string('gallery_image_6')->nullable();
        });
    }
};
