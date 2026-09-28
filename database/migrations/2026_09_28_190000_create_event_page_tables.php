<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Event Banner Section
        Schema::create('event_banner_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->nullable();
            $table->string('title', 500);
            $table->text('description')->nullable();
            $table->string('client_image_1')->nullable();
            $table->string('client_image_2')->nullable();
            $table->string('client_image_3')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        DB::table('event_banner_sections')->insert([
            'tag' => 'upcoming events',
            'title' => 'Upcoming weddings and showcases',
            'description' => 'Every love story is unique and deserves a beautiful beginning. We design heartfelt celebrations with thoughtful details,with creating timeless experiences.',
            'client_image_1' => 'images/6a6305be5040b777232a1497_event-client-image.webp',
            'client_image_2' => 'images/6a6305be5040b777232a1499_event-client-image-two.webp',
            'client_image_3' => 'images/6a6305be5040b777232a1498_event-client-image-three.webp',
            'banner_image' => 'images/6a6305bf5040b777232a15d9_event-banner-image.avif',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Event Section Header
        Schema::create('event_section_headers', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->nullable();
            $table->string('title', 500);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('event_section_headers')->insert([
            'tag' => 'Our event',
            'title' => 'Planning your perfection',
            'description' => 'Thoughtfully curating every detail to bring your vision to life with elegance, seamless coordination, and unforgettable wedding moments.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Event Items
        Schema::create('event_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('date_text')->nullable();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('time_text')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(1);
            $table->string('status')->default('active');
            $table->timestamps();
        });

        $initialEvents = [
            [
                'title' => 'Romantic garden couple shoot',
                'slug' => 'romantic-garden-couple-shoot',
                'date_text' => 'August 12, 2025',
                'description' => 'A romantic garden-inspired couple edit capturing timeless elegance, soft florals, and intimate wedding moments.',
                'location' => 'Paris',
                'time_text' => '9:00 AM - 11:00 AM',
                'image' => 'images/6a6305bf5040b777232a182e_Event-image-one.avif',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'title' => 'Luxury vintage car arrival',
                'slug' => 'luxury-vintage-car-arrival',
                'date_text' => 'September 2, 2025',
                'description' => 'A refined wedding moment featuring graceful arrivals, classic elegance, and unforgettable celebrations.',
                'location' => 'Florence',
                'time_text' => '10:15 AM - 11:15 AM',
                'image' => 'images/6a6305bf5040b777232a1836_Event-image-two.avif',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'title' => 'A sparkling moment together',
                'slug' => 'a-sparking-moment-together',
                'date_text' => 'July 1, 2025',
                'description' => 'A beautiful couple moment filled with joy, elegance, and timeless romance in a sparkling wedding atmosphere.',
                'location' => 'London',
                'time_text' => '11:30 AM - 12:30 PM',
                'image' => 'images/6a6305bf5040b777232a183f_Event-image-three.avif',
                'sort_order' => 3,
                'status' => 'active',
            ],
            [
                'title' => 'Candid moments of joy with love',
                'slug' => 'candid-moments-of-joy-with-love',
                'date_text' => 'August 21, 2025',
                'description' => 'Natural moments of laughter and love beautifully captured, celebrating genuine emotions.',
                'location' => 'Rome',
                'time_text' => '12:45 PM - 1:45 PM',
                'image' => 'images/6a6305bf5040b777232a1839_Event-image-four.avif',
                'sort_order' => 4,
                'status' => 'active',
            ],
            [
                'title' => 'Waterfront garden altar sea views',
                'slug' => 'waterfront-garden-altar-sea-views',
                'date_text' => 'October 15, 2025',
                'description' => 'A breathtaking waterfront garden altar surrounded by sea views, creating a romantic celebrations.',
                'location' => 'Milan',
                'time_text' => '2:00 PM - 3:00 PM',
                'image' => 'images/6a6305bf5040b777232a1838_Event-image-five.avif',
                'sort_order' => 5,
                'status' => 'active',
            ],
            [
                'title' => 'Sunset stroll through gardens',
                'slug' => 'sunset-stroll-through-gardens',
                'date_text' => 'December 17, 2025',
                'description' => 'A romantic sunset stroll through blooming gardens, capturing timeless love in a peaceful atmosphere.',
                'location' => 'Nice',
                'time_text' => '3:15 PM - 4:15 PM',
                'image' => 'images/6a6305bf5040b777232a183d_Event-image-six.avif',
                'sort_order' => 6,
                'status' => 'active',
            ],
            [
                'title' => 'Floral bridal garden mood',
                'slug' => 'floral-bridal-garden-mood',
                'date_text' => 'April 16, 2025',
                'description' => 'A dreamy floral bridal garden setting filled with soft blooms, elegant details, and timeless romantic charm.',
                'location' => 'Venice',
                'time_text' => '4:30 PM - 5:30 PM',
                'image' => 'images/69fda8c857c7ebe55cda2a82_Event-image-seven.avif',
                'sort_order' => 7,
                'status' => 'active',
            ],
            [
                'title' => 'Chic spring wedding scene',
                'slug' => 'chic-spring-wedding-scene',
                'date_text' => 'January 24, 2026',
                'description' => 'A chic spring wedding scene featuring fresh florals, elegant styling, and a romantic atmosphere full of charm.',
                'location' => 'Vienna',
                'time_text' => '5:45 PM - 6:30 PM',
                'image' => 'images/6a6305bf5040b777232a1861_Event-image-eight.avif',
                'sort_order' => 8,
                'status' => 'active',
            ],
            [
                'title' => 'Spring bridal garden showcase',
                'slug' => 'spring-bridal-garden-showcase',
                'date_text' => 'November 19, 2025',
                'description' => 'An elegant spring bridal garden showcase filled with blooming florals, refined decor, and wedding inspiration.',
                'location' => 'New York,USA',
                'time_text' => '5:30 PM - 6:30 PM',
                'image' => 'images/6a6305bf5040b777232a1850_Event-image-nine.avif',
                'sort_order' => 9,
                'status' => 'active',
            ],
        ];

        foreach ($initialEvents as $evt) {
            DB::table('event_items')->insert(array_merge($evt, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('event_items');
        Schema::dropIfExists('event_section_headers');
        Schema::dropIfExists('event_banner_sections');
    }
};
