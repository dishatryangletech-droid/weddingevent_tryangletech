<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'name', 'email', 'mobileno', 'guests', 'package', 'venue', 'wedding_date', 'event_date', 'message', 'status', 'is_replied', 'reply_message'
    ];
}
