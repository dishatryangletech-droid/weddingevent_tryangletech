<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'name', 'email', 'guests', 'package', 'venue', 'wedding_date', 'message', 'status', 'is_replied', 'reply_message'
    ];
}
