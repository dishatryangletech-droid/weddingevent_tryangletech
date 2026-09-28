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
        // Drop tables if re-running
        Schema::dropIfExists('about_page_missions');
        Schema::dropIfExists('about_page_stories');
        Schema::dropIfExists('about_page_banners');

        // 1. Banner Section Table
        Schema::create('about_page_banners', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable()->default('LUXURY CELEBRATIONS | SCENIC LOVE STORIES');
            $table->string('title')->nullable()->default('Artfully directed wedding experiences');
            $table->text('subtitle')->nullable();
            $table->string('button_text')->nullable()->default("Let's plan");
            $table->string('button_link')->nullable()->default('#');
            
            // 5 explicit tag points
            $table->string('tag_1')->nullable()->default('Bespoke');
            $table->string('tag_2')->nullable()->default('Artistry');
            $table->string('tag_3')->nullable()->default('Modern');
            $table->string('tag_4')->nullable()->default('Design');
            $table->string('tag_5')->nullable()->default('Elegant');

            $table->string('tags')->nullable()->default('Bespoke, Artistry, Modern, Design, Elegant');
            $table->string('background_image')->nullable();
            $table->string('card_image')->nullable();
            $table->text('card_text')->nullable();
            $table->timestamps();
        });

        // Seed default Banner Section
        DB::table('about_page_banners')->insert([
            'tagline' => 'LUXURY CELEBRATIONS | SCENIC LOVE STORIES',
            'title' => 'Artfully directed wedding experiences',
            'subtitle' => 'A walkthrough of how we translate your personal love story into a visual language at Knotcraft.',
            'button_text' => "Let's plan",
            'button_link' => '#',
            'tag_1' => 'Bespoke',
            'tag_2' => 'Artistry',
            'tag_3' => 'Modern',
            'tag_4' => 'Design',
            'tag_5' => 'Elegant',
            'tags' => 'Bespoke, Artistry, Modern, Design, Elegant',
            'background_image' => 'images/6a6305bf5040b777232a182a_Event-image-two-one.avif',
            'card_image' => 'images/6a6305bf5040b777232a1836_Event-image-two.avif',
            'card_text' => 'We craft wedding experiences that bring your love story to life.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Story Section Table
        Schema::create('about_page_stories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default('Designing weddings that reflect your story');
            $table->text('description')->nullable();
            $table->string('left_main_image')->nullable();
            
            $table->string('feature_1_title')->nullable()->default('Beautifully curated');
            $table->text('feature_1_desc')->nullable();
            $table->string('feature_1_button_text')->nullable()->default('View packages');
            $table->string('feature_1_button_link')->nullable()->default('#');

            $table->string('feature_2_title')->nullable()->default('Seamless celebrations');
            $table->text('feature_2_desc')->nullable();
            $table->string('feature_2_button_text')->nullable()->default('View packages');
            $table->string('feature_2_button_link')->nullable()->default('#');

            $table->string('right_card_title')->nullable()->default('Wedding studio');
            $table->string('right_card_subtitle')->nullable()->default('Est. 2011');
            $table->string('right_card_image')->nullable();
            $table->string('right_card_bottom_text')->nullable()->default('Redefining wedding experiences');
            $table->timestamps();
        });

        // Seed default Story Section
        DB::table('about_page_stories')->insert([
            'title' => 'Designing weddings that reflect your story',
            'description' => 'Welcome to our wedding studio, where every celebration is thoughtfully designed with elegance and emotion. We create timeless wedding experiences that blend creativity.',
            'left_main_image' => 'images/6a6305bf5040b777232a1839_Event-image-four.avif',
            'feature_1_title' => 'Beautifully curated',
            'feature_1_desc' => 'Part of the wedding journey begins with understanding your unique story.',
            'feature_1_button_text' => 'View packages',
            'feature_1_button_link' => '#',
            'feature_2_title' => 'Seamless celebrations',
            'feature_2_desc' => 'A beautiful marriage launch begins with honoring your personal romance.',
            'feature_2_button_text' => 'View packages',
            'feature_2_button_link' => '#',
            'right_card_title' => 'Wedding studio',
            'right_card_subtitle' => 'Est. 2011',
            'right_card_image' => 'images/6a6305bf5040b777232a1838_Event-image-five.avif',
            'right_card_bottom_text' => 'Redefining wedding experiences',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Mission Section Table
        Schema::create('about_page_missions', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable()->default('OUR MISSION');
            $table->string('title')->nullable()->default('Dedicated to create graceful wedding experiences');
            $table->text('description')->nullable();
            $table->string('button_text')->nullable()->default('Contact us');
            $table->string('button_link')->nullable()->default('/contact');

            $table->string('video_poster')->nullable();
            $table->string('video_mp4')->nullable();
            $table->string('video_webm')->nullable();

            for ($i = 1; $i <= 4; $i++) {
                $table->string("feature_{$i}_title")->nullable();
                $table->string("feature_{$i}_image")->nullable();
            }
            $table->timestamps();
        });

        // Seed default Mission Section
        DB::table('about_page_missions')->insert([
            'tagline' => 'OUR MISSION',
            'title' => 'Dedicated to create graceful wedding experiences',
            'description' => 'We craft elegant, personalized celebrations that reflect your love story, ensuring every moment feels seamless, meaningful, and beautifully memorable.',
            'button_text' => 'Contact us',
            'button_link' => '/contact',
            'video_poster' => 'images/69e06bfff096fe744c997c8d_6a43634cafebe64db07790d1_new_poster.0000000.jpg',
            'video_mp4' => 'videos/6a6305bf5040b777232a1809_new_mp4.mp4',
            'video_webm' => 'videos/6a6305bf5040b777232a1809_new_webm.webm',
            'feature_1_title' => 'Elevated experiences for every guest',
            'feature_1_image' => 'images/6a6305bf5040b777232a1836_Event-image-two.avif',
            'feature_2_title' => 'Flawless execution of your exact vision',
            'feature_2_image' => 'images/6a6305bf5040b777232a1839_Event-image-four.avif',
            'feature_3_title' => 'Bespoke design and artistic styling for you',
            'feature_3_image' => 'images/6a6305bf5040b777232a1838_Event-image-five.avif',
            'feature_4_title' => 'Capturing every timeless shared moment',
            'feature_4_image' => 'images/6a6305bf5040b777232a182a_Event-image-two-one.avif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_page_missions');
        Schema::dropIfExists('about_page_stories');
        Schema::dropIfExists('about_page_banners');
    }
};
