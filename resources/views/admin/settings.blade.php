@extends('layouts.admin')
@section('title', 'Global Settings - Admin')
@section('page_header', 'Platform Configuration')

@section('extra_css')
<style>
    .form-container {
        background: white; padding: 2.5rem; border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;
        max-width: 800px;
    }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155; }
    .form-control { width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 8px; font-family: inherit; font-size: 1rem; background: #f8fafc; transition: border-color 0.2s; box-sizing: border-box; }
    .form-control:focus { outline: none; border-color: var(--accent); background: #ffffff; }
    .btn-submit { background: var(--accent); color: white; border: none; padding: 0.75rem 2rem; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 1rem; transition: background 0.2s; }
    .btn-submit:hover { background: #2563eb; }
</style>
@endsection

@section('content')
<div class="form-container">
    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="contact_email">Corporate Contact Email</label>
            <input type="email" id="contact_email" name="contact_email" class="form-control" value="{{ old('contact_email', $setting->contact_email) }}" placeholder="sales@sarsinfotech.com">
        </div>

        <div class="form-group">
            <label for="contact_phone">Direct Phone</label>
            <input type="text" id="contact_phone" name="contact_phone" class="form-control" value="{{ old('contact_phone', $setting->contact_phone) }}" placeholder="+1 (800) 555-0199">
        </div>
        
        <div class="form-group">
            <label for="address">Corporate Headquarters Address</label>
            <textarea id="address" name="address" class="form-control" rows="3" placeholder="789 Enterprise Blvd, NY 10001">{{ old('address', $setting->address) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="map_embed_url">Google Maps Embed URL (src attribute)</label>
            <p style="font-size: 0.85rem; color: #64748b; margin-top: -0.25rem; margin-bottom: 0.5rem;">Go to Google Maps -> Share -> Embed a Map -> Copy ONLY the link inside the src="" parameter.</p>
            <textarea id="map_embed_url" name="map_embed_url" class="form-control" rows="4" placeholder="https://www.google.com/maps/embed?...">{{ old('map_embed_url', $setting->map_embed_url) }}</textarea>
        </div>

        <div style="margin: 3rem 0; border-top: 1px solid #e2e8f0; padding-top: 2rem;">
            <h3 style="margin-top: 0; color: #0f172a; display: flex; align-items: center; gap: 0.5rem;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                Razorpay API Configuration
            </h3>
            <p style="font-size: 0.9rem; color: #64748b; margin-bottom: 1.5rem;">For security, the API Secret will remain blinded in the database but will process transactions natively.</p>

            <div class="form-group">
                <label for="razorpay_key">Razorpay Key ID</label>
                <input type="text" id="razorpay_key" name="razorpay_key" class="form-control" value="{{ old('razorpay_key', $setting->razorpay_key) }}" placeholder="rzp_live_xxxxxxxxxxxxxx">
            </div>

            <div class="form-group">
                <label for="razorpay_secret">Razorpay Key Secret</label>
                <input type="password" id="razorpay_secret" name="razorpay_secret" class="form-control" value="" placeholder="••••••••••••••••••••••••">
            </div>
        </div>
        
        <button type="submit" class="btn-submit">Save Settings</button>
    </form>
</div>
@endsection
