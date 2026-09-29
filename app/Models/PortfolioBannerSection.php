<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PortfolioBannerSection extends Model
{
    use HasFactory;

    protected $table = 'portfolio_banner_sections';

    protected $fillable = [
        'tag',
        'title',
        'description',
        'banner_image',
        'status',
    ];

    public static function getSettings(): self
    {
        $settings = self::first();

        if (! $settings) {
            $settings = self::create([
                'tag'          => 'Portfolio',
                'title'        => 'Event design to make your heart skip a beat',
                'description'  => null,
                'banner_image' => 'images/6a6305bf5040b777232a178b_portfolio-banner-image.avif',
                'status'       => 'active',
            ]);
        }

        return $settings;
    }

    public function getBannerImageUrlAttribute(): string
    {
        if (! $this->banner_image) {
            return asset('images/6a6305bf5040b777232a178b_portfolio-banner-image.avif');
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
