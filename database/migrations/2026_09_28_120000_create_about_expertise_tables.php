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
        // 1. Expertise Section Header
        Schema::create('about_page_expertises', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable()->default('OUR EXPERTISE');
            $table->string('title')->nullable()->default('Bespoke planning services for luxury celebrations');
            $table->string('left_image')->nullable();
            $table->timestamps();
        });

        // Seed default Section Header
        DB::table('about_page_expertises')->insert([
            'tagline' => 'OUR EXPERTISE',
            'title' => 'Bespoke planning services for luxury celebrations',
            'left_image' => 'images/6a6305bf5040b777232a1839_Event-image-four.avif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Expertise Accordion Items
        Schema::create('about_page_expertise_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed 4 default Expertise Items matching screenshot
        DB::table('about_page_expertise_items')->insert([
            [
                'title' => 'Destination scouting',
                'description' => 'Finding the perfect, breathtaking backdrop to frame your unique love story and create lifelong memories.',
                'image' => 'images/6a6305bf5040b777232a1836_Event-image-two.avif',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Creative art direction',
                'description' => 'Crafting a cohesive visual narrative, blending color, texture, and mood into an unforgettable aesthetic.',
                'image' => 'images/6a6305bf5040b777232a1838_Event-image-five.avif',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Full wedding orchestration',
                'description' => 'Seamless management of every logistical detail from vendor coordination to timeline control on your big day.',
                'image' => 'images/6a6305bf5040b777232a182a_Event-image-two-one.avif',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bespoke decor design',
                'description' => 'Designing custom floral arrangements, tablescapes, lighting, and ambient styling tailored specifically for you.',
                'image' => 'images/6a6305bf5040b777232a1834_Event-post-one-image-four.avif',
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
        Schema::dropIfExists('about_page_expertise_items');
        Schema::dropIfExists('about_page_expertises');
    }
};
