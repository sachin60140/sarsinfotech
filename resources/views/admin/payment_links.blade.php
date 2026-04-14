@extends('layouts.admin')
@section('title', 'Razorpay Payment Links - Admin')
@section('page_header', 'Generate Delivery Links')

@section('extra_css')
<style>
    .form-container {
        background: white; padding: 2.5rem; border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;
        max-width: 600px;
    }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155; font-size: 0.9rem; }
    .form-control { width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 8px; font-family: inherit; font-size: 0.95rem; background: #f8fafc; transition: border-color 0.2s; box-sizing: border-box; }
    .form-control:focus { outline: none; border-color: var(--accent); background: #ffffff; }
    .btn-submit { background: #10b981; color: white; border: none; padding: 0.85rem 0; width: 100%; border-radius: 8px; cursor: pointer; font-weight: 800; font-size: 1.05rem; transition: background 0.2s; box-shadow: 0 4px 14px 0 rgba(16, 185, 129, 0.39); }
    .btn-submit:hover { background: #059669; }
</style>
@endsection

@section('content')
<div class="form-container">
    <h3 style="margin-top: 0; color: #0f172a; border-bottom: 2px solid #f1f5f9; padding-bottom: 1rem; margin-bottom: 1.5rem;">Create New Payment URL</h3>
    <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 2rem;">The underlying gateway automatically dispatches official notification texts directly integrating to the client natively.</p>

    <form action="{{ route('admin.payment_links.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_name">Client Official Name</label>
            <input type="text" id="customer_name" name="customer_name" class="form-control" required placeholder="John Doe">
        </div>
        <div class="form-group">
            <label for="customer_mobile">Direct Mobile</label>
            <input type="tel" id="customer_mobile" name="customer_mobile" class="form-control" required placeholder="+919876543210">
        </div>
        <div class="form-group">
            <label for="customer_email">Corporate Email</label>
            <input type="email" id="customer_email" name="customer_email" class="form-control" required placeholder="user@company.com">
        </div>
        <div class="form-group">
            <label for="amount">Capital Remittance (INR)</label>
            <input type="number" step="0.01" id="amount" name="amount" class="form-control" required placeholder="5000.00" style="font-weight: 700; color: #16a34a;">
        </div>
        <div class="form-group">
            <label for="description">Invoice Parameter / Note</label>
            <textarea id="description" name="description" class="form-control" rows="3" required placeholder="Deployment of custom API..."></textarea>
        </div>

        <button type="submit" class="btn-submit">Dispatch Razorpay URL Native</button>
    </form>
</div>
@endsection
