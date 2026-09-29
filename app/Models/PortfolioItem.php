<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PortfolioItem extends Model
{
    use HasFactory;

    protected $table = 'portfolio_items';

    protected $fillable = [
        'portfolio_tag_id',
        'title',
        'slug',
        'subtitle',
        'client_name',
        'date_text',
        'time_text',
        'location',
        'description',
        'image',
        'detail_headline',
        'detail_content',
        'detail_sub_image',
        'detail_highlight_1',
        'detail_highlight_2',
        'gallery_tag',
        'gallery_title',
        'gallery_image_1',
        'gallery_image_2',
        'gallery_image_3',
        'gallery_image_4',
        'sort_order',
        'status',
    ];

    public function tag()
    {
        return $this->belongsTo(PortfolioTag::class, 'portfolio_tag_id');
    }

    public function getImageUrlAttribute(): string
    {
        if (! $this->image) {
            return asset('images/6a6305bf5040b777232a182e_Event-image-one.avif');
        }
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        if (str_starts_with($this->image, 'images/') || str_starts_with($this->image, 'assets/')) {
            return asset($this->image);
        }
        return Storage::disk('public')->url($this->image);
    }

    public function getDetailSubImageUrlAttribute(): string
    {
        if (! $this->detail_sub_image) {
            return asset('images/6a6305bf5040b777232a184b_Event-data.avif');
        }
        if (str_starts_with($this->detail_sub_image, 'http://') || str_starts_with($this->detail_sub_image, 'https://')) {
            return $this->detail_sub_image;
        }
        if (str_starts_with($this->detail_sub_image, 'images/') || str_starts_with($this->detail_sub_image, 'assets/')) {
            return asset($this->detail_sub_image);
        }
        return Storage::disk('public')->url($this->detail_sub_image);
    }

    public function getGalleryImage1UrlAttribute(): string
    {
        if (! $this->gallery_image_1) {
            return asset('images/6a6305bf5040b777232a1703_Classic-gallery.avif');
        }
        if (str_starts_with($this->gallery_image_1, 'http://') || str_starts_with($this->gallery_image_1, 'https://')) {
            return $this->gallery_image_1;
        }
        if (str_starts_with($this->gallery_image_1, 'images/') || str_starts_with($this->gallery_image_1, 'assets/')) {
            return asset($this->gallery_image_1);
        }
        return Storage::disk('public')->url($this->gallery_image_1);
    }

    public function getGalleryImage2UrlAttribute(): string
    {
        if (! $this->gallery_image_2) {
            return asset('images/6a6305bf5040b777232a171d_Elegance-gallery.avif');
        }
        if (str_starts_with($this->gallery_image_2, 'http://') || str_starts_with($this->gallery_image_2, 'https://')) {
            return $this->gallery_image_2;
        }
        if (str_starts_with($this->gallery_image_2, 'images/') || str_starts_with($this->gallery_image_2, 'assets/')) {
            return asset($this->gallery_image_2);
        }
        return Storage::disk('public')->url($this->gallery_image_2);
    }

    public function getGalleryImage3UrlAttribute(): string
    {
        if (! $this->gallery_image_3) {
            return asset('images/6a6305bf5040b777232a17f7_Moment-large-image.avif');
        }
        if (str_starts_with($this->gallery_image_3, 'http://') || str_starts_with($this->gallery_image_3, 'https://')) {
            return $this->gallery_image_3;
        }
        if (str_starts_with($this->gallery_image_3, 'images/') || str_starts_with($this->gallery_image_3, 'assets/')) {
            return asset($this->gallery_image_3);
        }
        return Storage::disk('public')->url($this->gallery_image_3);
    }

    public function getGalleryImage4UrlAttribute(): string
    {
        if (! $this->gallery_image_4) {
            return asset('images/6a6305bf5040b777232a17f6_Moment-large-image.avif');
        }
        if (str_starts_with($this->gallery_image_4, 'http://') || str_starts_with($this->gallery_image_4, 'https://')) {
            return $this->gallery_image_4;
        }
        if (str_starts_with($this->gallery_image_4, 'images/') || str_starts_with($this->gallery_image_4, 'assets/')) {
            return asset($this->gallery_image_4);
        }
        return Storage::disk('public')->url($this->gallery_image_4);
    }
}
