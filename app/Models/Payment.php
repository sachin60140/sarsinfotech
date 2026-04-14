<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'name', 'email', 'mobile', 'invoice_number', 'remarks', 
        'amount', 'currency', 'razorpay_order_id', 
        'razorpay_payment_id', 'razorpay_signature', 'status'
    ];
}
