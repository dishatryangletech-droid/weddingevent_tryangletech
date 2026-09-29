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
        Schema::table('event_items', function (Blueprint $table) {
            $table->string('gallery_tag')->nullable()->default('WEDDING Gallery')->after('gallery_image_4');
            $table->string('gallery_title')->nullable()->default('Explore our exclusive signature wedding clicks')->after('gallery_tag');
        });
    }

    public function down(): void
    {
        Schema::table('event_items', function (Blueprint $table) {
            $table->dropColumn(['gallery_tag', 'gallery_title']);
        });
    }
};
