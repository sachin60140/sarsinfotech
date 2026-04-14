<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentLink;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index()
    {
        return view('pages.payment');
    }

    public function createOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required|string',
            'invoice_number' => 'nullable|string',
            'remarks' => 'nullable|string',
            'amount' => 'required|numeric|min:1',
        ]);

        $setting = Setting::first();
        if (!$setting || !$setting->razorpay_key || !$setting->razorpay_secret) {
            return response()->json(['error' => 'Payment Gateway is currently offline. Please contact administrator.'], 500);
        }

        // Razorpay expects amount in paise (multiply by 100)
        $amountInPaise = (int)($request->amount * 100);

        // Native secure server-side call replacing external packages
        $response = Http::withBasicAuth($setting->razorpay_key, $setting->razorpay_secret)
            ->post('https://api.razorpay.com/v1/orders', [
                'amount' => $amountInPaise,
                'currency' => 'INR',
                'receipt' => 'rcpt_' . time()
            ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Secure Order Generation Failed.'], 500);
        }

        $razorpayOrderId = $response->json()['id'];

        // Establish ledger securely
        $payment = Payment::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'invoice_number' => $request->invoice_number,
            'remarks' => $request->remarks,
            'amount' => $request->amount,
            'currency' => 'INR',
            'razorpay_order_id' => $razorpayOrderId,
            'status' => 'pending'
        ]);

        return response()->json([
            'razorpay_order_id' => $razorpayOrderId,
            'razorpay_key' => $setting->razorpay_key,
            'amount' => $amountInPaise,
            'payment_id_db' => $payment->id
        ]);
    }

    public function verifyPayment(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required',
            'razorpay_order_id' => 'required',
            'razorpay_signature' => 'required',
            'payment_id_db' => 'required'
        ]);

        $setting = Setting::first();
        
        // Native HMAC SHA-256 verification (irrevocably secure)
        $signaturePayload = $request->razorpay_order_id . '|' . $request->razorpay_payment_id;
        $expectedSignature = hash_hmac('sha256', $signaturePayload, $setting->razorpay_secret);

        if (hash_equals($expectedSignature, $request->razorpay_signature)) {
            $payment = Payment::findOrFail($request->payment_id_db);
            $payment->razorpay_payment_id = $request->razorpay_payment_id;
            $payment->razorpay_signature = $request->razorpay_signature;
            $payment->status = 'paid';
            $payment->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['error' => 'Cryptographic Signature Invalid'], 400);
    }
    
    // Admin Dashboard View
    public function adminIndex()
    {
        $payments = Payment::orderBy('created_at', 'desc')->get();
        return view('admin.payments', compact('payments'));
    }

    // Payment Links GUI
    public function adminPaymentLinks()
    {
        return view('admin.payment_links');
    }

    // Razorpay Integration Logic
    public function adminStorePaymentLink(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_mobile' => 'required|string',
            'amount' => 'required|numeric|min:1',
            'description' => 'required|string',
        ]);

        $setting = Setting::first();
        if (!$setting || !$setting->razorpay_key || !$setting->razorpay_secret) {
            return back()->withErrors(['Gateway error: Razorpay API keys are utterly unconfigured globally.']);
        }

        $amountInPaise = (int)($request->amount * 100);

        // Native Server-to-Server Razorpay Links Payload
        $response = Http::withBasicAuth($setting->razorpay_key, $setting->razorpay_secret)
            ->post('https://api.razorpay.com/v1/payment_links', [
                'amount' => $amountInPaise,
                'currency' => 'INR',
                'accept_partial' => false,
                'description' => $request->description,
                'customer' => [
                    'name' => $request->customer_name,
                    'contact' => $request->customer_mobile,
                    'email' => $request->customer_email
                ],
                'notify' => [
                    'sms' => true,
                    'email' => true
                ],
                'reminder_enable' => true,
                'notes' => [
                    'generated_by' => 'admin_dashboard'
                ]
            ]);

        if ($response->failed()) {
            return back()->withErrors(['Razorpay Edge Network Failure: ' . $response->body()]);
        }

        $razorpayData = $response->json();

        // Push successfully to tracking DB exclusively
        PaymentLink::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_mobile' => $request->customer_mobile,
            'amount' => $request->amount,
            'currency' => 'INR',
            'description' => $request->description,
            'razorpay_link_id' => $razorpayData['id'] ?? null,
            'payment_url' => $razorpayData['short_url'] ?? null,
            'status' => $razorpayData['status'] ?? 'created',
        ]);

        return redirect()->route('admin.payment_links.sent')->with('success', 'Razorpay URL natively dispatched & integrated.');
    }

    // View Sent Links with Date Filtering
    public function adminSentLinks(Request $request)
    {
        $query = PaymentLink::query();

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $links = $query->orderBy('created_at', 'desc')->get();
        return view('admin.view_payment_links', compact('links'));
    }

    // Dynamic Razorpay Webhook Protocol
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $signature = $request->header('X-Razorpay-Signature');
        $setting = Setting::first();

        // Webhook Secret Verification Array natively
        // Assume default secret is Razorpay API Secret if explicit Webhook Secret isn't mapped
        $expectedSignature = hash_hmac('sha256', $payload, $setting->razorpay_secret ?? '');

        // Standard verification (for testing, allow bypass if signature fits perfectly)
        if (hash_equals($expectedSignature, $signature)) {
            $event = $request->input('event');

            if ($event === 'payment_link.paid' || $event === 'payment_link.partially_paid') {
                $linkId = $request->input('payload.payment_link.entity.id');
                $status = $request->input('payload.payment_link.entity.status');
                
                if ($linkId) {
                    PaymentLink::where('razorpay_link_id', $linkId)
                        ->update(['status' => $status]);
                }
            }

            return response()->json(['status' => 'Webhook efficiently accepted natively']);
        }
        
        return response()->json(['error' => 'Cryptographic Signature Array Invalid'], 400);
    }
}
