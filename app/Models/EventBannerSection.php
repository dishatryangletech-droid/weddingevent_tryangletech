<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EventBannerSection extends Model
{
    use HasFactory;

    protected $table = 'event_banner_sections';

    protected $fillable = [
        'tag',
        'title',
        'description',
        'client_image_1',
        'client_image_2',
        'client_image_3',
        'banner_image',
        'status',
    ];

    public static function getSettings(): self
    {
        $settings = self::first();

        if (! $settings) {
            $settings = self::create([
                'tag' => 'upcoming events',
                'title' => 'Upcoming weddings and showcases',
                'description' => 'Every love story is unique and deserves a beautiful beginning. We design heartfelt celebrations with thoughtful details,with creating timeless experiences.',
                'client_image_1' => 'images/6a6305be5040b777232a1497_event-client-image.webp',
                'client_image_2' => 'images/6a6305be5040b777232a1499_event-client-image-two.webp',
                'client_image_3' => 'images/6a6305be5040b777232a1498_event-client-image-three.webp',
                'banner_image' => 'images/6a6305bf5040b777232a15d9_event-banner-image.avif',
                'status' => 'active',
            ]);
        }

        return $settings;
    }

    public function getClientImage1UrlAttribute(): string
    {
        if (! $this->client_image_1) {
            return asset('images/6a6305be5040b777232a1497_event-client-image.webp');
        }
        if (str_starts_with($this->client_image_1, 'http://') || str_starts_with($this->client_image_1, 'https://')) {
            return $this->client_image_1;
        }
        if (str_starts_with($this->client_image_1, 'images/') || str_starts_with($this->client_image_1, 'assets/')) {
            return asset($this->client_image_1);
        }
        return Storage::disk('public')->url($this->client_image_1);
    }

    public function getClientImage2UrlAttribute(): string
    {
        if (! $this->client_image_2) {
            return asset('images/6a6305be5040b777232a1499_event-client-image-two.webp');
        }
        if (str_starts_with($this->client_image_2, 'http://') || str_starts_with($this->client_image_2, 'https://')) {
            return $this->client_image_2;
        }
        if (str_starts_with($this->client_image_2, 'images/') || str_starts_with($this->client_image_2, 'assets/')) {
            return asset($this->client_image_2);
        }
        return Storage::disk('public')->url($this->client_image_2);
    }

    public function getClientImage3UrlAttribute(): string
    {
        if (! $this->client_image_3) {
            return asset('images/6a6305be5040b777232a1498_event-client-image-three.webp');
        }
        if (str_starts_with($this->client_image_3, 'http://') || str_starts_with($this->client_image_3, 'https://')) {
            return $this->client_image_3;
        }
        if (str_starts_with($this->client_image_3, 'images/') || str_starts_with($this->client_image_3, 'assets/')) {
            return asset($this->client_image_3);
        }
        return Storage::disk('public')->url($this->client_image_3);
    }

    public function getBannerImageUrlAttribute(): string
    {
        if (! $this->banner_image) {
            return asset('images/6a6305bf5040b777232a15d9_event-banner-image.avif');
        }
        if (str_starts_with($this->banner_image, 'http://') || str_starts_with($this->banner_image, 'https://')) {
            return $this->banner_image;
        }
        if (str_starts_with($this->banner_image, 'images/') || str_starts_with($this->banner_image, 'assets/')) {
            return asset($this->banner_image);
        }
        return Storage::disk('public')->url($this->banner_image);
    }
}
