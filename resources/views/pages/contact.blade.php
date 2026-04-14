@extends('layouts.main')

@section('title', 'Contact Us | Sars Infotech')
@section('description', 'Get in touch with Sars Infotech to discuss your next big IT project.')

@section('extra_styles')
<style>
    .contact-hero {
        padding: 5rem 5% 4rem; text-align: center;
        background: var(--bg-surface);
        border-bottom: 1px solid var(--border-light);
        position: relative; overflow: hidden;
    }
    .contact-hero h1 { font-size: clamp(2.5rem, 5vw, 4rem); color: var(--text-primary); margin-bottom: 1rem; font-weight: 800; letter-spacing: -2px; }
    .contact-hero p { color: var(--text-secondary); font-size: 1.25rem; max-width: 600px; margin: 0 auto; line-height: 1.6; }
</style>
@endsection

@section('content')
<section class="contact-hero">
    <div class="container">
        <h1>Contact Our Experts</h1>
        <p>Fill out the form below and one of our specialists will be in touch within 24 hours.</p>
    </div>
</section>

<section id="contact-form" style="padding-top: 0;">
    <div class="container">
        <div class="contact-container">
            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert-error">
                    <ul style="list-style: none;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lead.store') }}" method="POST" class="form-grid modern-form" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; background: #fff; padding: 4rem; border-radius: 20px; border: 1px solid var(--border-light); box-shadow: 0 20px 40px -15px rgba(0,0,0,0.05); max-width: 900px; margin: 0 auto;">
                @csrf
                
                <div class="form-group" style="grid-column: 1 / -1;">
                    <label for="name">Legal Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" required placeholder="John Doe">
                </div>
                
                <div class="form-group">
                    <label for="email">Corporate Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="john@enterprise.com">
                </div>
                
                <div class="form-group">
                    <label for="phone">Direct Phone</label>
                    <input type="tel" id="phone" name="phone" class="form-control" required placeholder="+1 234 567 8900">
                </div>
                
                <div class="form-group">
                    <label for="service">Target Capability</label>
                    <select id="service" name="service_interested" class="form-control" required>
                        <option value="" disabled selected>Select an infrastructure...</option>
                        <option value="Bulk SMS Service">Bulk SMS Processing</option>
                        <option value="RCS Messaging">RCS Implementations</option>
                        <option value="WhatsApp API Solutions">Enterprise WhatsApp API</option>
                        <option value="Custom Software Development">Custom Architecture</option>
                        <option value="SEO Services">Technical SEO & Edge</option>
                        <option value="Social Media Marketing (SMM)">Data-Driven SMM</option>
                        <option value="Multiple/Other">Multi-Pipeline Integration</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="budget">Allocated Budget (INR)</label>
                    <select id="budget" name="budget" class="form-control">
                        <option value="">Select capital range...</option>
                        <option value="Less than ₹50k">Seed (< ₹50,000)</option>
                        <option value="₹50k - ₹2L">Growth (₹50k - ₹2 Lakhs)</option>
                        <option value="₹2L - ₹5L">Scale (₹2 Lakhs - ₹5 Lakhs)</option>
                        <option value="₹5L+">Enterprise (₹5 Lakhs+)</option>
                    </select>
                </div>
                
                <div class="form-group" style="grid-column: 1 / -1;">
                    <label for="message">Deployment Specifications</label>
                    <textarea id="message" name="message" class="form-control" rows="5" placeholder="Detail your technical requirements or business objectives..."></textarea>
                </div>
                
                <div style="grid-column: 1 / -1; margin-top: 1rem;">
                    <button type="submit" class="btn" style="width: 100%; border-radius: 12px; padding: 1.25rem;">Deploy Contact Request</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
