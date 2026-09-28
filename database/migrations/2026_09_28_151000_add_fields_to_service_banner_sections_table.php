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
        Schema::table('service_banner_sections', function (Blueprint $table) {
            $table->text('subtitle')->nullable()->after('title');
            $table->string('card_image')->nullable()->after('banner_image');
            $table->text('card_text')->nullable()->after('card_image');
        });

        DB::table('service_banner_sections')->where('id', 1)->update([
            'subtitle' => 'A walkthrough of how we translate your personal love story into a visual language at Knotcraft.',
            'card_image' => 'images/6a6305be5040b777232a14ba_service-three-right-image.avif',
            'card_text' => 'We craft wedding experiences that bring your love story to life.',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_banner_sections', function (Blueprint $table) {
            $table->dropColumn(['subtitle', 'card_image', 'card_text']);
        });
    }
};
