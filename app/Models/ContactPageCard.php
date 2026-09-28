<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPageCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon_type',
        'title',
        'subtitle',
        'sort_order',
    ];
}
