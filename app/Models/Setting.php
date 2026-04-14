<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['address', 'map_embed_url', 'contact_email', 'contact_phone', 'razorpay_key', 'razorpay_secret'];
}
