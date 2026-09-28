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
        // 1. Service Banner Section
        Schema::create('service_banner_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title', 500);
            $table->string('button_text')->default('Discover packages');
            $table->string('button_url')->default('/booking-inquiry');
            $table->string('banner_image')->nullable();
            $table->json('items')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        DB::table('service_banner_sections')->insert([
            'title' => 'Making your wedding dreams real',
            'button_text' => 'Discover packages',
            'button_url' => '/booking-inquiry',
            'banner_image' => 'images/6a5f284c810d7a049d5bfdd3_Banner-image.avif',
            'items' => json_encode([
                ['title' => '12+ Years of work experience'],
                ['title' => '98% Rated 4.9/5 from over 1200 reviews'],
            ]),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Service Expertise Section
        Schema::create('service_expertise_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->nullable();
            $table->string('title', 500);
            $table->json('cards')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        DB::table('service_expertise_sections')->insert([
            'tag' => 'ABOUT US',
            'title' => 'Crafting timeless celebrations',
            'cards' => json_encode([
                [
                    'title' => 'Our Approach',
                    'description' => 'Our approach transforms romantic visions into vision realities that define unforgettable life milestones.',
                    'image' => 'images/6a5eeacfc71e4284d7209709_Service-page-about-one-image.avif',
                ],
                [
                    'title' => 'Personalized planning',
                    'description' => 'Tailoring every celebration to reflect your all unique story and dreams.',
                    'image' => 'images/6a5ef42ebf6ca9cfcecf2cd6_Service-page-about-two-image.avif',
                ],
                [
                    'title' => 'Seamless experience',
                    'description' => 'Ensuring a seamless journey so you can enjoy every moment.',
                    'image' => 'images/6a5eeacfc71e4284d7209709_Service-page-about-one-image.avif',
                ],
            ]),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Service Process Section
        Schema::create('service_process_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->nullable();
            $table->string('title', 500);
            $table->json('steps')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        DB::table('service_process_sections')->insert([
            'tag' => 'OUR PROCESS',
            'title' => 'How we bring your dream wedding to life',
            'steps' => json_encode([
                [
                    'step_number' => '01',
                    'title' => 'Planning',
                    'description' => 'From themes to timelines, we curate every detail for a seamless experience.',
                    'image' => 'images/6a5f78bd3fbca2eb73cf453b_Service-process-image-one.avif',
                ],
                [
                    'step_number' => '02',
                    'title' => 'Design phase',
                    'description' => 'Transforming your vision into cohesive decor, florals, and spatial layouts.',
                    'image' => 'images/6a5f78bd3fbca2eb73cf453c_Service-process-image-two.avif',
                ],
                [
                    'step_number' => '03',
                    'title' => 'Execution',
                    'description' => 'Coordinating vendors, schedules, and production to execute flawlessly on site.',
                    'image' => 'images/6a5f78bd3fbca2eb73cf453d_Service-process-image-three.avif',
                ],
                [
                    'step_number' => '04',
                    'title' => 'On-site support',
                    'description' => 'From arrivals to the final dance, we oversee every single moment to create a celebration.',
                    'image' => 'images/6a5f78bd3fbca2eb73cf453e_Service-process-image-four.avif',
                ],
            ]),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. Service FAQ Section
        Schema::create('service_faq_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->nullable();
            $table->string('title', 500);
            $table->text('subtitle')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('contact_subtitle')->nullable();
            $table->string('contact_button_text')->nullable();
            $table->string('contact_button_url')->nullable();
            $table->string('contact_image')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        DB::table('service_faq_sections')->insert([
            'tag' => 'FAQ',
            'title' => 'Elegant answers for your special celebrations',
            'subtitle' => 'Answers to common questions about our wedding planning services.',
            'contact_title' => 'All your questions are always welcome!',
            'contact_subtitle' => 'Reach out to our team anytime.',
            'contact_button_text' => 'Contact now',
            'contact_button_url' => '/contact',
            'contact_image' => 'images/6a600ca41bb5fbdf9fbcf30f_Service-faq-support-image.avif',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 5. Service FAQs
        Schema::create('service_faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question', 500);
            $table->text('answer');
            $table->integer('order')->default(1);
            $table->string('status')->default('active');
            $table->timestamps();
        });

        $faqs = [
            [
                'question' => 'How do you plan our wedding from start to finish?',
                'answer' => 'We handle everything from initial venue scouting, moodboard design, vendor negotiations, budget allocation, to on-the-day management and coordination.',
                'order' => 1,
            ],
            [
                'question' => 'Can you customize weddings based on our theme?',
                'answer' => 'Absolutely! Every detail is tailored specifically to reflect your vision, love story, and unique design aesthetic.',
                'order' => 2,
            ],
            [
                'question' => 'Do you offer budget friendly planning options?',
                'answer' => 'Yes, we offer flexible service packages tailored to different wedding scales, budgets, and guest capacities.',
                'order' => 3,
            ],
            [
                'question' => 'What is your policy on cancellations or date changes?',
                'answer' => 'We provide transparent contracts with flexible rescheduling options to accommodate unexpected date changes or unforeseen events.',
                'order' => 4,
            ],
        ];

        foreach ($faqs as $faq) {
            DB::table('service_faqs')->insert([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'order' => $faq['order'],
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_faqs');
        Schema::dropIfExists('service_faq_sections');
        Schema::dropIfExists('service_process_sections');
        Schema::dropIfExists('service_expertise_sections');
        Schema::dropIfExists('service_banner_sections');
    }
};
