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
        // 1. Contact Header Section Table
        Schema::create('contact_page_headers', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable()->default('GET IN TOUCH');
            $table->string('title')->nullable()->default('Inquire about your timeless union');
            $table->string('background_image')->nullable();
            $table->timestamps();
        });

        // Seed default Header
        DB::table('contact_page_headers')->insert([
            'tagline' => 'GET IN TOUCH',
            'title' => 'Inquire about your timeless union',
            'background_image' => 'images/6a6305bf5040b777232a1839_Event-image-four.avif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Contact Info Cards Table
        Schema::create('contact_page_cards', function (Blueprint $table) {
            $table->id();
            $table->string('icon_type')->nullable()->default('email');
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed 3 default Contact Info Cards matching screenshot
        DB::table('contact_page_cards')->insert([
            [
                'icon_type' => 'email',
                'title' => 'info@example.com',
                'subtitle' => 'Have a project in mind? Send a message.',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon_type' => 'phone',
                'title' => '(888) 456 - 7890',
                'subtitle' => "We're interested in working together!",
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon_type' => 'address',
                'title' => '123 Riverbend, California 94025, USA',
                'subtitle' => 'Join our growing team?',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 3. Contact Form Settings Table
        Schema::create('contact_page_forms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default('Send us a message');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Seed default Contact Form Settings
        DB::table('contact_page_forms')->insert([
            'title' => 'Send us a message',
            'image' => 'images/6a6305bf5040b777232a1836_Event-image-two.avif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 4. Contact FAQ Section Header Table
        Schema::create('contact_page_faqs', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable()->default('FAQ');
            $table->string('title')->nullable()->default('Elegant answers for your special celebrations');
            $table->timestamps();
        });

        // Seed default FAQ Header
        DB::table('contact_page_faqs')->insert([
            'tagline' => 'FAQ',
            'title' => 'Elegant answers for your special celebrations',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 5. Contact FAQ Items Table
        Schema::create('contact_page_faq_items', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed 5 default FAQ items matching screenshot
        DB::table('contact_page_faq_items')->insert([
            [
                'question' => 'How do you plan our wedding from start to finish?',
                'answer' => 'We start with an in-depth consultation to understand your vision, followed by detailed curation, vendor coordination, and seamless on-day management.',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Can you customize weddings based on our theme?',
                'answer' => 'Absolutely! Every element from venue styling to floral arrangements and tableware is completely tailored to your theme and personal story.',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Do you offer budget friendly planning options?',
                'answer' => 'We offer transparent, flexible packages tailored to fit a range of investment levels without compromising on quality or elegance.',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'What is your policy on cancellations or date changes?',
                'answer' => 'We offer flexible rescheduling options subject to venue and vendor availability, ensuring peace of mind during unforeseen events.',
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Is it possible to change dates or cancels a booked event?',
                'answer' => 'Yes, our team works closely with you and all key partners to accommodate date changes wherever possible.',
                'sort_order' => 5,
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
        Schema::dropIfExists('contact_page_faq_items');
        Schema::dropIfExists('contact_page_faqs');
        Schema::dropIfExists('contact_page_forms');
        Schema::dropIfExists('contact_page_cards');
        Schema::dropIfExists('contact_page_headers');
    }
};
