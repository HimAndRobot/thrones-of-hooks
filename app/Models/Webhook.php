<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webhook extends Model
{
    use HasFactory;

    public function payloads()
    {
        return $this->hasMany(WebhookPayload::class)->orderBy('id', 'desc');
    }
}
