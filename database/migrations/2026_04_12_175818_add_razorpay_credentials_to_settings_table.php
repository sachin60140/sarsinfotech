<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('razorpay_key')->nullable()->after('contact_phone');
            $table->string('razorpay_secret')->nullable()->after('razorpay_key');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['razorpay_key', 'razorpay_secret']);
        });
    }
};
