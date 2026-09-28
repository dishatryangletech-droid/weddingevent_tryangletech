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
        Schema::table('service_expertise_sections', function (Blueprint $table) {
            $table->string('center_image')->nullable()->after('title');
        });

        DB::table('service_expertise_sections')->where('id', 1)->update([
            'center_image' => 'images/6a6305bf5040b777232a15fa_About-home-one-image.avif',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_expertise_sections', function (Blueprint $table) {
            $table->dropColumn('center_image');
        });
    }
};
