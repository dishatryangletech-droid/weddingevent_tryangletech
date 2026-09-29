<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOfferSection extends Model
{
    protected $fillable = [
        'tag',
        'title',
        'status',
    ];

    public static function getSettings()
    {
        return self::first() ?? self::create([
            'tag' => 'Services we offer',
            'title' => 'Browse luxury wedding services with curated planning, styling, and ideas for your perfect celebration',
            'status' => 'active',
        ]);
    }
}
