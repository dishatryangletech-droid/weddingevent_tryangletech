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
            $table->string('gallery_image_5')->nullable()->after('gallery_image_4');
            $table->string('gallery_image_6')->nullable()->after('gallery_image_5');
            $table->string('video_mp4')->nullable()->after('gallery_image_6');
            $table->string('video_webm')->nullable()->after('video_mp4');
            $table->string('video_poster')->nullable()->after('video_webm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->dropColumn(['gallery_image_5', 'gallery_image_6', 'video_mp4', 'video_webm', 'video_poster']);
        });
    }
};
