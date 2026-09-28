<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageStatItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_number',
        'number_title',
        'description',
        'sort_order',
    ];
}
