<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/services/{slug}', [PageController::class, 'service'])->name('service');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/TermAndCondition', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');

// Fallback login route for Auth Middleware
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::post('/payment/order', [PaymentController::class, 'createOrder'])->name('payment.order');
Route::post('/payment/verify', [PaymentController::class, 'verifyPayment'])->name('payment.verify');
Route::post('/payment/webhook', [PaymentController::class, 'handleWebhook'])->name('payment.webhook');

Route::post('/submit-lead', [LeadController::class, 'store'])->name('lead.store');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    
    Route::middleware('auth')->group(function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/payments', [PaymentController::class, 'adminIndex'])->name('payments');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
        Route::get('/password', [AdminController::class, 'password'])->name('password');
        Route::post('/password', [AdminController::class, 'updatePassword'])->name('password.update');
        
        // Payment Links
        Route::get('/payment-links/create', [PaymentController::class, 'adminPaymentLinks'])->name('payment_links.create');
        Route::post('/payment-links', [PaymentController::class, 'adminStorePaymentLink'])->name('payment_links.store');
        
        Route::get('/payment-links/sent', [PaymentController::class, 'adminSentLinks'])->name('payment_links.sent');
    });
});
