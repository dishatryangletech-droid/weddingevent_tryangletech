<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ServiceBannerSection extends Model
{
    use HasFactory;

    protected $table = 'service_banner_sections';

    protected $fillable = [
        'title',
        'subtitle',
        'button_text',
        'button_url',
        'banner_image',
        'card_image',
        'card_text',
        'items',
        'status',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public static function getSettings(): self
    {
        $settings = self::first();

        if (! $settings) {
            $settings = self::create([
                'title' => 'Making your wedding dreams real',
                'subtitle' => 'A walkthrough of how we translate your personal love story into a visual language at Knotcraft.',
                'button_text' => 'Discover packages',
                'button_url' => '/booking-inquiry',
                'banner_image' => 'images/6a5f284c810d7a049d5bfdd3_Banner-image.avif',
                'card_image' => 'images/6a6305be5040b777232a14ba_service-three-right-image.avif',
                'card_text' => 'We craft wedding experiences that bring your love story to life.',
                'items' => [
                    ['title' => '12+ Years of work experience'],
                    ['title' => '98% Rated 4.9/5 from over 1200 reviews'],
                ],
                'status' => 'active',
            ]);
        }

        return $settings;
    }

    public function getBannerImageUrlAttribute(): string
    {
        if (! $this->banner_image) {
            return asset('images/6a5f284c810d7a049d5bfdd3_Banner-image.avif');
        }

        if (str_starts_with($this->banner_image, 'http://') || str_starts_with($this->banner_image, 'https://')) {
            return $this->banner_image;
        }

        if (str_starts_with($this->banner_image, 'images/') || str_starts_with($this->banner_image, 'assets/')) {
            return asset($this->banner_image);
        }

        return Storage::disk('public')->url($this->banner_image);
    }

    public function getCardImageUrlAttribute(): string
    {
        if (! $this->card_image) {
            return asset('images/6a6305be5040b777232a14ba_service-three-right-image.avif');
        }

        if (str_starts_with($this->card_image, 'http://') || str_starts_with($this->card_image, 'https://')) {
            return $this->card_image;
        }

        if (str_starts_with($this->card_image, 'images/') || str_starts_with($this->card_image, 'assets/')) {
            return asset($this->card_image);
        }

        return Storage::disk('public')->url($this->card_image);
    }
}
