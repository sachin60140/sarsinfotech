<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentLink extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_mobile',
        'amount',
        'currency',
        'description',
        'razorpay_link_id',
        'payment_url',
        'status'
    ];
}
