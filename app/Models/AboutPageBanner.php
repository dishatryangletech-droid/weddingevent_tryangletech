<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'tagline',
        'title',
        'subtitle',
        'button_text',
        'button_link',
        'tag_1',
        'tag_2',
        'tag_3',
        'tag_4',
        'tag_5',
        'tags',
        'background_image',
        'card_image',
        'card_text',
    ];
}
