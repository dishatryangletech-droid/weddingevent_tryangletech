<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FooterSetting extends Model
{
    use HasFactory;

    protected $table = 'footer_settings';

    protected $fillable = [
        'logo',
        'about_text',
        'social_heading',
        'facebook_url',
        'linkedin_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'quick_links_heading',
        'services_heading',
        'services_view_all_text',
        'services_view_all_url',
        'services_links',
        'contact_heading',
        'email_label',
        'email',
        'phone_label',
        'phone',
        'copyright_text',
        'copyright_link_text',
        'copyright_link_url',
        'licenses_text',
        'licenses_url',
        'style_guide_text',
        'style_guide_url',
        'status',
    ];

    protected $casts = [
        'services_links' => 'array',
    ];

    /**
     * Get or create single settings instance.
     */
    public static function getSettings(): self
    {
        $settings = self::first();

        if (! $settings) {
            $settings = self::create([
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
                'services_links' => [
                    ['title' => 'Home', 'url' => '/'],
                    ['title' => 'About', 'url' => '/about'],
                    ['title' => 'Service', 'url' => '/service-three'],
                    ['title' => 'Events', 'url' => '/event'],
                    ['title' => 'Portfolio', 'url' => '/portfolio'],
                    ['title' => 'Blog', 'url' => '/blog'],
                    ['title' => 'Contact', 'url' => '/contact'],
                ],
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
            ]);
        }

        return $settings;
    }

    /**
     * Accessor for full logo URL.
     */
    public function getLogoUrlAttribute(): string
    {
        if (! $this->logo) {
            return asset('images/elegant_occasions_logo_white.png');
        }

        if (str_starts_with($this->logo, 'http://') || str_starts_with($this->logo, 'https://')) {
            return $this->logo;
        }

        if (str_starts_with($this->logo, 'images/') || str_starts_with($this->logo, 'assets/')) {
            return asset($this->logo);
        }

        return Storage::url($this->logo);
    }
}
