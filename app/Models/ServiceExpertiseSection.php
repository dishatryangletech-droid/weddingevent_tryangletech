<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ServiceExpertiseSection extends Model
{
    use HasFactory;

    protected $table = 'service_expertise_sections';

    protected $fillable = [
        'tag',
        'title',
        'center_image',
        'cards',
        'status',
    ];

    protected $casts = [
        'cards' => 'array',
    ];

    public static array $defaultCardImages = [
        'images/6a5eeacfc71e4284d7209709_Service-page-about-one-image.avif',
        'images/6a5ef42ebf6ca9cfcecf2cd6_Service-page-about-two-image.avif',
        'images/6a5eeacfc71e4284d7209709_Service-page-about-one-image.avif',
    ];

    public static function getSettings(): self
    {
        $settings = self::first();

        if (! $settings) {
            $settings = self::create([
                'tag' => 'ABOUT US',
                'title' => 'Crafting timeless celebrations',
                'center_image' => 'images/6a6305bf5040b777232a15fa_About-home-one-image.avif',
                'cards' => [
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
                ],
                'status' => 'active',
            ]);
        }

        return $settings;
    }

    public function getCenterImageUrlAttribute(): string
    {
        if (! $this->center_image) {
            return asset('images/6a6305bf5040b777232a15fa_About-home-one-image.avif');
        }

        if (str_starts_with($this->center_image, 'http://') || str_starts_with($this->center_image, 'https://')) {
            return $this->center_image;
        }

        if (str_starts_with($this->center_image, 'images/') || str_starts_with($this->center_image, 'assets/')) {
            return asset($this->center_image);
        }

        return Storage::disk('public')->url($this->center_image);
    }

    public function getCardImageUrl(int $index): string
    {
        $cards = $this->cards ?? [];
        $path = $cards[$index]['image'] ?? (self::$defaultCardImages[$index] ?? null);

        return self::getImageUrl($path);
    }

    public static function getImageUrl(?string $path): string
    {
        if (! $path) {
            return asset('images/6a5eeacfc71e4284d7209709_Service-page-about-one-image.avif');
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_starts_with($path, 'images/') || str_starts_with($path, 'assets/')) {
            return asset($path);
        }

        return Storage::disk('public')->url($path);
    }
}
