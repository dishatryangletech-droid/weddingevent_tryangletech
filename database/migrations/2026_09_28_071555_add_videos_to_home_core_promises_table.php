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
        Schema::table('home_core_promises', function (Blueprint $table) {
            $table->string('video_mp4')->nullable();
            $table->string('video_webm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_core_promises', function (Blueprint $table) {
            $table->dropColumn(['video_mp4', 'video_webm']);
        });
    }
};
