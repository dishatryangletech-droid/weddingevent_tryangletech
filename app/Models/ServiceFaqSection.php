<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ServiceFaqSection extends Model
{
    use HasFactory;

    protected $table = 'service_faq_sections';

    protected $fillable = [
        'tag',
        'title',
        'subtitle',
        'image_one',
        'image_two',
        'contact_title',
        'contact_subtitle',
        'contact_button_text',
        'contact_button_url',
        'contact_image',
        'status',
    ];

    public static function getSettings(): self
    {
        $settings = self::first();

        if (! $settings) {
            $settings = self::create([
                'tag' => 'FAQ',
                'title' => 'Elegant answers for your special celebrations',
                'subtitle' => 'Answers to common questions about our wedding planning services.',
                'image_one' => 'images/6a6305bf5040b777232a16b0_Faq-image.avif',
                'image_two' => 'images/6a6305bf5040b777232a1575_faq-image.avif',
                'contact_title' => 'All your questions are always welcome!',
                'contact_subtitle' => 'Reach out to our team anytime.',
                'contact_button_text' => 'Contact now',
                'contact_button_url' => '/contact',
                'contact_image' => 'images/6a600ca41bb5fbdf9fbcf30f_Service-faq-support-image.avif',
                'status' => 'active',
            ]);
        }

        return $settings;
    }

    public function getImageOneUrlAttribute(): string
    {
        if (! $this->image_one) {
            return asset('images/6a6305bf5040b777232a16b0_Faq-image.avif');
        }

        if (str_starts_with($this->image_one, 'http://') || str_starts_with($this->image_one, 'https://')) {
            return $this->image_one;
        }

        if (str_starts_with($this->image_one, 'images/') || str_starts_with($this->image_one, 'assets/')) {
            return asset($this->image_one);
        }

        return Storage::disk('public')->url($this->image_one);
    }

    public function getImageTwoUrlAttribute(): string
    {
        if (! $this->image_two) {
            return asset('images/6a6305bf5040b777232a1575_faq-image.avif');
        }

        if (str_starts_with($this->image_two, 'http://') || str_starts_with($this->image_two, 'https://')) {
            return $this->image_two;
        }

        if (str_starts_with($this->image_two, 'images/') || str_starts_with($this->image_two, 'assets/')) {
            return asset($this->image_two);
        }

        return Storage::disk('public')->url($this->image_two);
    }

    public function getContactImageUrlAttribute(): string
    {
        if (! $this->contact_image) {
            return asset('images/6a600ca41bb5fbdf9fbcf30f_Service-faq-support-image.avif');
        }

        if (str_starts_with($this->contact_image, 'http://') || str_starts_with($this->contact_image, 'https://')) {
            return $this->contact_image;
        }

        if (str_starts_with($this->contact_image, 'images/') || str_starts_with($this->contact_image, 'assets/')) {
            return asset($this->contact_image);
        }

        return Storage::disk('public')->url($this->contact_image);
    }
}
