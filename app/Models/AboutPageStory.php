<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'left_main_image',
        'feature_1_title',
        'feature_1_desc',
        'feature_1_button_text',
        'feature_1_button_link',
        'feature_2_title',
        'feature_2_desc',
        'feature_2_button_text',
        'feature_2_button_link',
        'right_card_title',
        'right_card_subtitle',
        'right_card_image',
        'right_card_bottom_text',
    ];
}
