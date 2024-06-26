<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebhookPayload extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d  H:m:s',
    ];
}
