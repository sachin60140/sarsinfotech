@extends('layouts.main')

@section('title', $service['name'] . ' | Sars Infotech')
@section('description', $service['desc'])

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Service",
  "serviceType": "{{ $service['name'] }}",
  "provider": {
    "@@type": "Organization",
    "name": "Sars Infotech",
    "url": "{{ url('/') }}"
  },
  "description": "{{ $service['desc'] }}"
}
</script>
@endsection

@section('extra_styles')
<style>
    .service-hero {
        padding: 8rem 5% 6rem;
        text-align: center;
        background: var(--bg-surface);
        border-bottom: 1px solid var(--border-light);
        position: relative; overflow: hidden;
    }
    .service-hero h1 { font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 800; margin-bottom: 1.5rem; color: var(--text-primary); letter-spacing: -2px; line-height: 1.1; }
    .service-hero p { font-size: 1.25rem; color: var(--text-secondary); max-width: 800px; margin: 0 auto; line-height: 1.8; }
    
    .benefits-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem; margin-top: 4rem; position: relative; z-index: 10;
    }
    .benefit-item {
        background: rgba(255, 255, 255, 0.8); border: 1px solid var(--border-light);
        padding: 2.5rem; border-radius: 16px; text-align: left;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02); transition: all 0.3s ease; backdrop-filter: blur(10px);
    }
    .benefit-item:hover { box-shadow: 0 20px 40px -15px rgba(37, 99, 235, 0.1); transform: translateY(-5px); border-color: rgba(37, 99, 235, 0.3); background: #ffffff; }
    .benefit-item h4 { color: var(--text-primary); font-size: 1.15rem; margin-bottom: 0.5rem; display: flex; align-items: flex-start; gap: 0.75rem; font-weight: 700; line-height: 1.4; letter-spacing: -0.5px; }
    .benefit-item h4::before { content: '✓'; color: #fff; font-weight: bold; background: linear-gradient(135deg, var(--primary), var(--accent)); padding: 2px 7px; border-radius: 50%; font-size: 0.85rem; box-shadow: 0 4px 10px -2px var(--primary-glow); }
</style>
@endsection

@section('content')
<section class="service-hero">
    <div class="tech-grid"></div>
    <div class="container" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <span class="section-label">Enterprise Capability</span>
        <h1>{{ $service['name'] }}</h1>
        <p>{{ $service['desc'] }} Empower your business architecture with our dedicated solutions natively designed to maximize your ROI and efficiency.</p>
        
        <div class="benefits-grid">
            @foreach($service['benefits'] as $benefit)
                <div class="benefit-item">
                    <h4>{{ $benefit }}</h4>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="enquiry">
    <div class="container">
        <h2 class="section-title">Schedule a Consultation for {{ $service['name'] }}</h2>
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

            <form action="{{ route('lead.store') }}" method="POST" class="form-grid modern-form" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; background: #fff; padding: 3rem; border-radius: 20px; border: 1px solid var(--border-light); box-shadow: 0 20px 40px -15px rgba(0,0,0,0.05); max-width: 900px; margin: 0 auto;">
                @csrf
                <!-- Pre-select the current service -->
                <input type="hidden" name="service_interested" value="{{ $service['name'] }}">
                
                <div class="form-group" style="grid-column: 1 / -1;">
                    <label for="name">Legal Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" required placeholder="John Doe">
                </div>
                
                <div class="form-group">
                    <label for="email">Corporate Email</label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="john@enterprise.com">
                </div>
                
                <div class="form-group">
                    <label for="phone">Direct Phone</label>
                    <input type="tel" id="phone" name="phone" class="form-control" required placeholder="+1 234 567 8900">
                </div>
                
                <div class="form-group" style="grid-column: 1 / -1;">
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
