<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSectionHeader extends Model
{
    use HasFactory;

    protected $table = 'event_section_headers';

    protected $fillable = [
        'tag',
        'title',
        'description',
    ];

    public static function getSettings(): self
    {
        $settings = self::first();

        if (! $settings) {
            $settings = self::create([
                'tag' => 'Our event',
                'title' => 'Planning your perfection',
                'description' => 'Thoughtfully curating every detail to bring your vision to life with elegance, seamless coordination, and unforgettable wedding moments.',
            ]);
        }

        return $settings;
    }
}
