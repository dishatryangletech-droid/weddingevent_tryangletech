<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogBannerSection extends Model
{
    protected $fillable = ['tag', 'title', 'description', 'banner_image', 'status'];

    public static function getSettings()
    {
        return self::first() ?? self::create([
            'tag' => 'Our blog',
            'title' => 'Wedding stories journal',
            'status' => 'active',
        ]);
    }
}
