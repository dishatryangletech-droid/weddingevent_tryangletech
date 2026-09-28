<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_faq_sections', function (Blueprint $table) {
            $table->string('image_one')->nullable()->after('subtitle');
            $table->string('image_two')->nullable()->after('image_one');
        });

        // Populate existing default values if record exists
        DB::table('service_faq_sections')->update([
            'image_one' => 'images/6a6305bf5040b777232a16b0_Faq-image.avif',
            'image_two' => 'images/6a6305bf5040b777232a1575_faq-image.avif',
        ]);
    }

    public function down(): void
    {
        Schema::table('service_faq_sections', function (Blueprint $table) {
            $table->dropColumn(['image_one', 'image_two']);
        });
    }
};
