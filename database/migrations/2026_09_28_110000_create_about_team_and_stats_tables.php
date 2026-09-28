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
        // Drop existing tables if refreshing
        Schema::dropIfExists('about_page_stat_items');
        Schema::dropIfExists('about_page_stats');
        Schema::dropIfExists('about_page_team_items');
        Schema::dropIfExists('about_page_teams');

        // 1. Team Section Header with Video Settings
        Schema::create('about_page_teams', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable()->default('ARTISTRY IN MOTION');
            $table->string('title')->nullable()->default('The artists behind your wedding legacy');
            $table->text('description')->nullable();
            $table->string('button_text')->nullable()->default('About us');
            $table->string('button_link')->nullable()->default('#');
            
            // Video Settings
            $table->string('video_poster')->nullable();
            $table->string('video_mp4')->nullable();
            $table->string('video_webm')->nullable();
            $table->timestamps();
        });

        // Seed default Team Section Header
        DB::table('about_page_teams')->insert([
            'tagline' => 'ARTISTRY IN MOTION',
            'title' => 'The artists behind your wedding legacy',
            'description' => 'A collective of artists transforming stories into cinematic experiences. We blend logistics with visionary design to craft legacies endure.',
            'button_text' => 'About us',
            'button_link' => '#',
            'video_poster' => 'images/69e06bfff096fe744c997c8d_6a43634cafebe64db07790d1_new_poster.0000000.jpg',
            'video_mp4' => 'videos/6a6305bf5040b777232a1809_new_mp4.mp4',
            'video_webm' => 'videos/6a6305bf5040b777232a1809_new_webm.webm',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Team Items
        Schema::create('about_page_team_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('image')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed default Team Items
        DB::table('about_page_team_items')->insert([
            [
                'name' => 'Mia Collings',
                'designation' => 'Creative lead',
                'image' => 'images/6a6305bf5040b777232a1836_Event-image-two.avif',
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lucas Vance',
                'designation' => 'Production director',
                'image' => 'images/6a6305bf5040b777232a1839_Event-image-four.avif',
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Elena Rostova',
                'designation' => 'Floral designer',
                'image' => 'images/6a6305bf5040b777232a1838_Event-image-five.avif',
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Julian Hayes',
                'designation' => 'Event architect',
                'image' => 'images/6a6305bf5040b777232a182a_Event-image-two-one.avif',
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 3. Stats Section Header
        Schema::create('about_page_stats', function (Blueprint $table) {
            $table->id();
            $table->string('background_image')->nullable();
            $table->timestamps();
        });

        // Seed default Stats Section Header
        DB::table('about_page_stats')->insert([
            'background_image' => 'images/6a6305bf5040b777232a182a_Event-image-two-one.avif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. Stats Items
        Schema::create('about_page_stat_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_number')->nullable();
            $table->string('number_title');
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed 4 default Stats items
        DB::table('about_page_stat_items')->insert([
            [
                'item_number' => '01',
                'number_title' => 'Since 2014',
                'description' => 'Couples routinely praise our team for providing flawless coordination, bespoke design, and magical celebrations that thrill everyone involved.',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_number' => '02',
                'number_title' => '120+ weddings',
                'description' => 'Clients frequently applaud our brand for offering premium guidance, detailed curation, and stunning events that delight couples without fail.',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_number' => '03',
                'number_title' => '1500+ guests / yr',
                'description' => 'Families regularly award us top marks for providing custom attention, intentional styling, and memorable events that amaze guests every time.',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_number' => '04',
                'number_title' => '4.9★ rating',
                'description' => 'Our clients consistently rate us highly for delivering exceptional service, thoughtful planning, and beautifully executed weddings that exceed expectations every time.',
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
        Schema::dropIfExists('about_page_stat_items');
        Schema::dropIfExists('about_page_stats');
        Schema::dropIfExists('about_page_team_items');
        Schema::dropIfExists('about_page_teams');
    }
};
