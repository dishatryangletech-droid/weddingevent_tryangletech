<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOfferItem extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'sort_order',
    ];
}
