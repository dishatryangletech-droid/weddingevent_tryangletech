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
        Schema::create('home_recognitions_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable()->default('Recognitions');
            $table->string('title')->nullable()->default('Capturing beautiful moments that last forever');
            $table->string('video_poster')->nullable();
            $table->string('video_mp4')->nullable();
            $table->string('video_webm')->nullable();
            $table->timestamps();
        });

        Schema::create('home_recognition_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('year');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed default section header
        DB::table('home_recognitions_sections')->insert([
            'tagline' => 'Recognitions',
            'title' => 'Capturing beautiful moments that last forever',
            'video_poster' => 'images/69e06bfff096fe744c997c8d_6a4f812362ce3a5e3f982a0f_GG_poster.0000000.jpg',
            'video_mp4' => 'videos/6a6305bf5040b777232a1810_GG_mp4.mp4',
            'video_webm' => 'videos/6a6305bf5040b777232a1810_GG_webm.webm',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed default recognition items matching user's screenshot
        DB::table('home_recognition_items')->insert([
            [
                'title' => 'Elegant floral curation awards',
                'year' => '2026',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Excellence in event planning',
                'year' => '2025',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Customer satisfaction award',
                'year' => '2024',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Innovative wedding design award',
                'year' => '2023',
                'sort_order' => 4,
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
        Schema::dropIfExists('home_recognition_items');
        Schema::dropIfExists('home_recognitions_sections');
    }
};
