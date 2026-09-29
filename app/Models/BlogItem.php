<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogItem extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'publish_date',
        'image',
        'banner_image',
        'content',
        'author_name',
        'author_role',
        'author_image',
        'sort_order',
        'status',
    ];
}
