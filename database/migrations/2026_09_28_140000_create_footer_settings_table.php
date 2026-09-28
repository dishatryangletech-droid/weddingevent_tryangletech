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
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->text('about_text')->nullable();
            $table->string('social_heading')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('quick_links_heading')->nullable();
            $table->string('services_heading')->nullable();
            $table->string('services_view_all_text')->nullable();
            $table->string('services_view_all_url')->nullable();
            $table->json('services_links')->nullable();
            $table->string('contact_heading')->nullable();
            $table->string('email_label')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_label')->nullable();
            $table->string('phone')->nullable();
            $table->string('copyright_text')->nullable();
            $table->string('copyright_link_text')->nullable();
            $table->string('copyright_link_url')->nullable();
            $table->string('licenses_text')->nullable();
            $table->string('licenses_url')->nullable();
            $table->string('style_guide_text')->nullable();
            $table->string('style_guide_url')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        // Seed initial default record
        DB::table('footer_settings')->insert([
            'logo' => 'images/elegant_occasions_logo_white.png',
            'about_text' => 'Crafting unforgettable celebrations that tell your story, with artistry, precision, and heart.',
            'social_heading' => 'Follow us',
            'facebook_url' => 'https://facebook.com',
            'linkedin_url' => 'https://linkedin.com',
            'twitter_url' => 'https://x.com',
            'instagram_url' => 'https://instagram.com',
            'youtube_url' => 'https://youtube.com',
            'quick_links_heading' => 'Useful links',
            'services_heading' => 'Get in touch',
            'services_view_all_text' => 'View all services',
            'services_view_all_url' => '/service-three',
            'services_links' => json_encode([
                ['title' => 'Home', 'url' => '/'],
                ['title' => 'About', 'url' => '/about'],
                ['title' => 'Service', 'url' => '/service-three'],
                ['title' => 'Events', 'url' => '/event'],
                ['title' => 'Portfolio', 'url' => '/portfolio'],
                ['title' => 'Blog', 'url' => '/blog'],
                ['title' => 'Contact', 'url' => '/contact'],
            ]),
            'contact_heading' => 'Get in touch',
            'email_label' => 'Email us',
            'email' => 'info@elegantoccasions.com',
            'phone_label' => 'Call us',
            'phone' => '(888) 123 4567',
            'copyright_text' => 'Designed by :',
            'copyright_link_text' => 'Flow Design Agency',
            'copyright_link_url' => 'https://www.flowdesignagency.com/',
            'licenses_text' => 'Licenses',
            'licenses_url' => '#',
            'style_guide_text' => 'Style guide',
            'style_guide_url' => '#',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};
