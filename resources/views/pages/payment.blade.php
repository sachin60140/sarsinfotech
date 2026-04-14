@extends('layouts.main')

@section('title', 'Secure Online Payment | Sars Infotech Pvt Ltd')

@section('extra_styles')
<style>
    /* Premium Grid Architecture */
    .payment-body {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 6rem 0;
        min-height: calc(100vh - 80px);
    }
    
    .payment-layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: 4rem;
        align-items: center;
    }
    
    @media (min-width: 992px) {
        .payment-layout {
            grid-template-columns: 1.1fr 0.9fr;
            gap: 5rem;
        }
    }
    
    /* Left Column: Trust & Info */
    .payment-info { display: flex; flex-direction: column; justify-content: center; }
    .payment-info h1 { font-size: clamp(2.5rem, 4vw, 3.5rem); font-weight: 800; color: #0f172a; line-height: 1.15; margin-bottom: 1.5rem; letter-spacing: -1px; }
    .payment-info h1 span { background: linear-gradient(to right, #2563eb, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .payment-info p { font-size: 1.15rem; color: #475569; line-height: 1.7; margin-bottom: 2.5rem; max-width: 600px; }
    
    .trust-badges { display: flex; flex-direction: column; gap: 1.5rem; }
    .badge-item { display: flex; align-items: flex-start; gap: 1.25rem; background: rgba(255, 255, 255, 0.7); padding: 1.5rem; border-radius: 16px; border: 1px solid #cbd5e1; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02); max-width: 550px;}
    .badge-item svg { width: 32px; height: 32px; stroke: #2563eb; flex-shrink: 0; }
    .badge-item div h4 { margin: 0 0 0.35rem 0; font-size: 1.1rem; font-weight: 800; color: #0f172a; }
    .badge-item div p { margin: 0; font-size: 0.95rem; color: #64748b; line-height: 1.5; }
    
    /* Right Column: The Form */
    .payment-card-wrapper { width: 100%; }
    .payment-card { background: #ffffff; padding: 2.5rem; border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1); border: 1px solid rgba(226, 232, 240, 0.8); width: 100%; position: relative; overflow: hidden; }
    .payment-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 6px; background: linear-gradient(to right, #2563eb, #3b82f6); }
    
    .form-grid { display: grid; grid-template-columns: 1fr; gap: 1.25rem; margin-top: 1.5rem;}
    @media (min-width: 640px) { .form-grid { grid-template-columns: 1fr 1fr; } }
    .col-full { grid-column: 1 / -1; }
    
    .pg-label { display: block; font-size: 0.9rem; font-weight: 700; color: #334155; margin-bottom: 0.5rem; }
    .pg-input { width: 100%; box-sizing: border-box; padding: 1rem 1.15rem; border: 1px solid #cbd5e1; border-radius: 12px; font-family: inherit; font-size: 1rem; background: #f8fafc; transition: all 0.3s; color: #0f172a; font-weight: 500; }
    .pg-input:focus { outline: none; border-color: #2563eb; background: #ffffff; box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15); }
    .pg-input::placeholder { color: #94a3b8; font-weight: 400; }
    
    .amount-wrapper { display: flex; align-items: center; background: #f8fafc; border: 1px solid #2563eb; border-radius: 16px; padding: 0.75rem 1.25rem; box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.05); }
    .amount-wrapper span { font-size: 2rem; font-weight: 800; color: #2563eb; margin-right: 0.5rem; }
    .amount-wrapper input { border: none; background: transparent; font-size: 2.25rem; font-weight: 800; color: #0f172a; width: 100%; outline: none; padding: 0; letter-spacing: -1px; }
    
    .btn-pay { width: 100%; padding: 1.25rem; border-radius: 14px; background: linear-gradient(135deg, #1d4ed8, #2563eb); border: none; color: white; font-size: 1.15rem; font-weight: 800; cursor: pointer; transition: all 0.2s; display: flex; justify-content: center; align-items: center; gap: 0.75rem; box-shadow: 0 10px 20px -5px rgba(37,99,235, 0.4); margin-top: 1rem; }
    .btn-pay:hover { transform: translateY(-3px); box-shadow: 0 15px 25px -5px rgba(37,99,235, 0.5); }
    .btn-pay:active { transform: translateY(0); }
    
    .success-box { display: none; background: #f0fdf4; border: 2px solid #22c55e; padding: 3rem 2rem; border-radius: 20px; text-align: center; }
    .error-box { display: none; background: #fee2e2; color: #991b1b; padding: 1rem 1.5rem; border-radius: 12px; border: 1px solid #fecaca; margin-bottom: 2rem; font-weight: 600; font-size: 0.95rem; }
    
    .loading-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.95); z-index: 9999; justify-content: center; align-items: center; flex-direction: column; backdrop-filter: blur(10px); }
    .spinner { border: 4px solid #e2e8f0; border-top: 4px solid #2563eb; border-radius: 50%; width: 60px; height: 60px; animation: spin 1s linear infinite; margin-bottom: 1.5rem; }
    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
</style>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection

@section('content')
<div class="payment-body">
    <div class="container">
        <div class="payment-layout">
            
            <!-- Left Side: Trust & Branding -->
            <div class="payment-info">
                <h1>Official Payments to<br/><span>Sars Infotech Pvt Ltd</span></h1>
                <p>Ensure your corporate invoices are settled seamlessly. This portal executes transactions directly through our native Razorpay 256-bit AES encrypted pipelines securely.</p>
                
                <div class="trust-badges">
                    <div class="badge-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        <div>
                            <h4>Bank-Grade Encryption</h4>
                            <p>All payloads are strictly mapped through SHA-256 HMAC cryptographic hashing algorithms natively.</p>
                        </div>
                    </div>
                    <div class="badge-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <div>
                            <h4>Instant Receipt Verification</h4>
                            <p>Invoices are logged permanently into our ledger, automatically triggering immediate confirmation receipts upon sync.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Interactive Form -->
            <div class="payment-card-wrapper">
                <div class="payment-card">
                    
                    <div id="successMessage" class="success-box">
                        <div style="background: #22c55e; width: 80px; height: 80px; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: 0 auto 1.5rem;">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        </div>
                        <h2 style="margin-top: 0; margin-bottom: 1rem; color: #166534; font-size: 1.75rem; font-weight: 800; letter-spacing: -0.5px;">
                            Payment Transferred Successfully
                        </h2>
                        <p style="margin: 0; color: #15803d; font-size: 1rem; line-height: 1.6;">
                            Your transaction has been mathematically secured. We deeply appreciate your business at Sars Infotech Pvt Ltd. A corporate receipt will be dispatched momentarily.
                        </p>
                    </div>

                    <div id="errorMessage" class="error-box"></div>

                    <form id="paymentForm">
                        @csrf
                        <div class="form-grid">
                            <div>
                                <label for="name" class="pg-label">Client Name *</label>
                                <input type="text" id="name" name="name" class="pg-input" required placeholder="John Doe">
                            </div>
                            <div>
                                <label for="email" class="pg-label">Email Address *</label>
                                <input type="email" id="email" name="email" class="pg-input" required placeholder="billing@domain.com">
                            </div>
                            <div>
                                <label for="mobile" class="pg-label">Mobile Number *</label>
                                <input type="tel" id="mobile" name="mobile" class="pg-input" required placeholder="+91 9876543210">
                            </div>
                            <div>
                                <label for="invoice_number" class="pg-label">Invoice # (Optional)</label>
                                <input type="text" id="invoice_number" name="invoice_number" class="pg-input" placeholder="INV-2026-...">
                            </div>
                            
                            <div class="col-full">
                                <label for="remarks" class="pg-label">Remarks / Subject</label>
                                <input type="text" id="remarks" name="remarks" class="pg-input" placeholder="Payment for custom development...">
                            </div>
                            
                            <div class="col-full" style="margin-top: 0.5rem;">
                                <label for="amount" class="pg-label" style="font-size: 1.1rem; color: #0f172a;">Total Capital Remittance *</label>
                                <div class="amount-wrapper">
                                    <span>₹</span>
                                    <input type="number" id="amount" name="amount" min="1" step="0.01" required placeholder="0.00">
                                </div>
                            </div>

                            <div class="col-full">
                                <button type="submit" id="payBtn" class="btn-pay">
                                    Secure Payment Gateway
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                </button>
                                <div style="text-align: center; margin-top: 1.25rem;">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Razorpay_logo.svg" alt="Razorpay Secured" style="height: 18px; filter: grayscale(100%) opacity(60%);">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="loading-overlay" id="loadingOverlay">
    <div class="spinner"></div>
    <h3 style="color: #0f172a; font-size: 1.75rem; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: -0.5px;">Authorizing Handshake...</h3>
    <p style="color: #475569; font-size: 1.1rem; font-weight: 500;">Establishing 256-bit encryption tunnel to Razorpay Arrays.</p>
</div>

<script>
document.getElementById('paymentForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = document.getElementById('payBtn');
    const overlay = document.getElementById('loadingOverlay');
    const errorAlert = document.getElementById('errorMessage');
    
    errorAlert.style.display = 'none';
    overlay.style.display = 'flex';
    
    const formData = new FormData(this);
    
    try {
        const orderResponse = await fetch("{{ route('payment.order') }}", {
            method: "POST",
            headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}", "Accept": "application/json" },
            body: formData
        });
        
        const orderData = await orderResponse.json();
        
        if (!orderResponse.ok) { throw new Error(orderData.error || 'Server rejected credentials.'); }

        overlay.style.display = 'none';
        
        const options = {
            "key": orderData.razorpay_key,
            "amount": orderData.amount,
            "currency": "INR",
            "name": "Sars Infotech Pvt Ltd",
            "description": formData.get('remarks') || "Corporate Remittance",
            "order_id": orderData.razorpay_order_id,
            "handler": async function (response) {
                overlay.style.display = 'flex';
                overlay.querySelector('h3').innerText = "Verifying Signature...";
                
                try {
                    const verifyResponse = await fetch("{{ route('payment.verify') }}", {
                        method: "POST",
                        headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                        body: JSON.stringify({
                            razorpay_payment_id: response.razorpay_payment_id,
                            razorpay_order_id: response.razorpay_order_id,
                            razorpay_signature: response.razorpay_signature,
                            payment_id_db: orderData.payment_id_db
                        })
                    });
                    
                    const verifyData = await verifyResponse.json();
                    overlay.style.display = 'none';
                    
                    if (verifyResponse.ok && verifyData.success) {
                        document.getElementById('paymentForm').style.display = 'none';
                        document.getElementById('successMessage').style.display = 'block';
                    } else {
                        throw new Error(verifyData.error || 'Cryptographic Verification Invalid.');
                    }
                } catch(err) {
                    overlay.style.display = 'none';
                    errorAlert.innerText = err.message;
                    errorAlert.style.display = 'block';
                }
            },
            "prefill": { "name": formData.get('name'), "email": formData.get('email'), "contact": formData.get('mobile') },
            "theme": { "color": "#0f172a" }
        };
        
        const rzp = new Razorpay(options);
        rzp.on('payment.failed', function (response){
            errorAlert.innerText = 'Payment routing dropped securely. Check your banking API limit.';
            errorAlert.style.display = 'block';
        });
        rzp.open();
        
    } catch (err) {
        overlay.style.display = 'none';
        errorAlert.innerText = err.message;
        errorAlert.style.display = 'block';
    }
});
</script>
@endsection
