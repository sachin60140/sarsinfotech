@extends('layouts.main')

@section('title', 'Best Bulk SMS Provider & TXN SMS Gateway | Sars Infotech')
@section('description', 'Accelerate enterprise marketing with our high-throughput Bulk SMS and TXN SMS pipelines. Connect to our secure API for instant OTPs, notifications, and alerts.')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {
      "@@type": "Question",
      "name": "What is the difference between Bulk SMS and TXN SMS?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Bulk SMS is typically used for promotional marketing campaigns sent to large audiences. TXN SMS (Transactional SMS) is used exclusively for time-sensitive, secure alerts like Bank OTPs, order updates, and system notifications with bypassed DND restrictions."
      }
    },
    {
      "@@type": "Question",
      "name": "How fast is your SMS API Gateway?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Our enterprise-grade routing architecture handles up to 5,000 SMS per second securely, ensuring latency is practically zero for high-priority OTP deliveries."
      }
    }
  ]
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Service",
  "serviceType": "Bulk SMS & TXN SMS Gateway",
  "provider": {
    "@@type": "Organization",
    "name": "Sars Infotech",
    "url": "{{ url('/') }}"
  },
  "description": "Premium High-Volume Bulk SMS, Transactional SMS, and Enterprise API Gateway infrastructure."
}
</script>
@endsection

@section('extra_styles')
<style>
    /* Premium Hero */
    .seo-hero { 
        padding: 9rem 5% 7rem; 
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); 
        color: #f8fafc; 
        position: relative; 
        overflow: hidden; 
        text-align: center; 
        border-bottom: 1px solid #334155; 
    }
    .seo-hero h1 { 
        font-size: clamp(2.75rem, 5vw, 4.5rem); 
        font-weight: 800; 
        letter-spacing: -1.5px; 
        line-height: 1.15; 
        margin-bottom: 1.5rem; 
    }
    .seo-hero h1 span { 
        background: linear-gradient(to right, #22c55e, #86efac);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .seo-hero p { 
        font-size: 1.25rem; 
        color: #94a3b8; 
        max-width: 800px; 
        margin: 0 auto 3rem; 
        line-height: 1.7; 
    }
    .hero-metrics {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
    }
    .metric-badge {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        backdrop-filter: blur(10px);
        font-weight: 600;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Article & Blueprint Block */
    .seo-blueprint { background: #ffffff; padding: 6rem 5%; }
    .blueprint-grid { display: grid; grid-template-columns: 1fr; gap: 4rem; max-width: 1200px; margin: 0 auto; align-items: center; }
    @media (min-width: 900px) { .blueprint-grid { grid-template-columns: 1fr 1fr; } }
    
    .blueprint-text h2 { font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 1.5rem; letter-spacing: -1px; line-height: 1.2;}
    .blueprint-text p { font-size: 1.1rem; color: #475569; line-height: 1.8; margin-bottom: 1.5rem; }
    
    .visual-placeholder { 
        background: transparent;
        display: flex; 
        align-items: center; 
        justify-content: center; 
        position: relative;
    }
    .visual-placeholder img {
        width: 100%;
        height: auto;
        border-radius: 24px;
        box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.4);
        border: 1px solid rgba(0, 0, 0, 0.1);
        object-fit: cover;
    }

    /* Deliverables Grid */
    .deliverables-section { background: #f8fafc; padding: 5rem 5% 7rem; border-top: 1px solid #e2e8f0; }
    .deliverables-header { text-align: center; margin-bottom: 4rem; }
    .deliverables-header h2 { font-size: 2.5rem; font-weight: 800; color: #0f172a; letter-spacing: -1px;}
    
    .deliverables-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
        gap: 2rem; 
        max-width: 1200px; 
        margin: 0 auto; 
    }
    .deliverable-card {
        background: #ffffff;
        padding: 2.5rem;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 25px -5px rgba(0,0,0,0.02);
        transition: transform 0.3s;
    }
    .deliverable-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px -10px rgba(34,197,94,0.1); border-color: #bbf7d0; }
    .icon-wrapper { width: 50px; height: 50px; background: #f0fdf4; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; }
    .icon-wrapper svg { stroke: #16a34a; width: 28px; height: 28px; }
    .deliverable-card h3 { font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem; }
    .deliverable-card p { color: #64748b; line-height: 1.6; font-size: 1rem; margin: 0; }

    /* Modern FAQ Grid */
    .modern-faq { background: #ffffff; padding: 6rem 5%; }
    .faq-container { max-width: 900px; margin: 0 auto; }
    .faq-box { padding: 2rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; margin-bottom: 1.5rem; transition: border 0.3s; }
    .faq-box:hover { border-color: #cbd5e1; }
    .faq-box h3 { font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 0.75rem 0; display: flex; gap: 0.75rem;}
    .faq-box h3 span { color: #22c55e; }
    .faq-box p { color: #475569; line-height: 1.6; margin: 0; padding-left: 2rem;}

    /* Premium Form */
    .contact-container {
        background: #ffffff;
        border-radius: 24px;
        border: 1px solid #e2e8f0;
        padding: 4rem;
        max-width: 1000px;
        margin: 0 auto;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.05);
        position: relative;
    }
    .contact-container::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0; height: 6px; background: linear-gradient(to right, #22c55e, #16a34a); border-radius: 24px 24px 0 0;
    }
    .form-control { background: #f8fafc; }
</style>
@endsection

@section('content')
<header class="seo-hero">
    <div class="tech-grid" style="mask-image: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%, transparent 100%);"></div>
    <div class="container" style="position: relative; z-index: 10; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
        <h1 style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;">The World's Best<br/><span>SMS Provider</span></h1>
        <p style="text-align: center;">Enterprise-grade Bulk SMS, high-velocity TXN SMS routing, and robust Developer APIs engineered for zero-latency communication.</p>
        
        <div class="hero-metrics">
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Zero Latency Routing
            </div>
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> 99.99% Node Uptime
            </div>
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> DND Bypass Authority
            </div>
        </div>
    </div>
</header>

<section class="seo-blueprint">
    <div class="blueprint-grid">
        <div class="blueprint-text">
            <h2>Unmatched Delivery with Bulk SMS Architecture</h2>
            <p>Marketing at a corporate scale requires more than just sending text messages; it requires strategic delivery infrastructure. As the industry's Best SMS Provider, Sars Infotech has engineered a massive Bulk SMS routing ecosystem.</p>
            <p>When you launch a campaign representing millions of endpoint nodes, our intelligent load-balancing algorithms ensure your Bulk SMS traffic avoids clogged pipelines, guaranteeing exceptional delivery metrics and boosting your ROI significantly.</p>
            
            <h3 style="margin-top: 2rem; font-size: 1.5rem; font-weight: 800; color: #0f172a;">TXN SMS & OTP Pipelines</h3>
            <p>While promotional campaigns drive growth, TXN SMS (Transactional SMS) drives trust. When a user requests a Bank OTP, a password reset, or vital server-down alert, latency can kill conversion rates. Our dedicated TXN SMS gateways are physically separated from promotional traffic queues, seamlessly penetrating DND (Do Not Disturb) logic natively and securely.</p>
        </div>
        
        <div class="visual-placeholder">
            <img src="{{ asset('images/bulk-sms-dashboard.png') }}" alt="Sars Infotech Enterprise Bulk SMS Dashboard">
        </div>
    </div>
</section>

<section class="deliverables-section">
    <div class="container">
        <div class="deliverables-header">
            <h2>Core Infrastructure Deliverables</h2>
            <p style="color: #64748b; font-size: 1.1rem; margin-top: 0.5rem;">The underlying matrix driving our Communication API.</p>
        </div>
        
        <div class="deliverables-grid">
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                </div>
                <h3>Cross-Platform Compatibility</h3>
                <p>Hook directly into Node.js, Python, or PHP utilizing our heavily validated RESTful endpoint methodologies seamlessly.</p>
            </div>
            
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                </div>
                <h3>Real-time Analytics Array</h3>
                <p>Fetch highly precise delivery statistics. Monitor bounce rates, DND drops, and carrier-level latency in an encrypted JSON payload.</p>
            </div>
            
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <h3>DLT Compliance Engine</h3>
                <p>Automated Indian market scrub-checkers to ensure payload legality instantly preventing any legal throttling globally.</p>
            </div>
        </div>
    </div>
</section>

<section class="modern-faq">
    <div class="faq-container">
        <h2 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; text-align: center; margin-bottom: 3rem;">Executive FAQs</h2>
        
        <div class="faq-box">
            <h3><span>Q.</span> What is the difference between Bulk SMS and TXN SMS?</h3>
            <p>Bulk SMS is generally utilized for high-volume promotional marketing campaigns distributed to an opt-in audience. TXN SMS is strict, non-promotional text—used exclusively for immediate, highly secure notifications like 2FA OTPs and urgent system updates natively bypassing DND restrictions.</p>
        </div>
        
        <div class="faq-box">
            <h3><span>Q.</span> How reliable is your SMS API Gateway?</h3>
            <p>As the Best SMS Provider, we offer a 99.99% uptime SLA. Our proprietary distribution architecture can absorb and process upwards of 5,000 requests per second securely, resulting in virtually instantaneous delivery times globally.</p>
        </div>
    </div>
</section>

<section id="enquiry" style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 6rem 0;">
    <div class="container">
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 3rem;">Schedule Strategic API Consultation</h2>
        <div class="contact-container">
            @if(session('success')) 
                <div class="alert-success" style="background: #dcfce7; color: #166534; padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem;">
                    {{ session('success') }}
                </div> 
            @endif

            @if($errors->any()) 
                <div class="alert-error" style="background: #fee2e2; color: #991b1b; padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem;">
                    <ul style="list-style: none; margin: 0; padding: 0;">
                        @foreach($errors->all() as $error) 
                            <li>• {{ $error }}</li> 
                        @endforeach
                    </ul>
                </div> 
            @endif

            <form action="{{ route('lead.store') }}" method="POST" style="display: grid; grid-template-columns: 1fr; gap: 1.5rem;">
                @csrf <input type="hidden" name="service_interested" value="Bulk SMS Service">
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                    <div><label for="name" style="display:block; font-weight:700; margin-bottom:0.5rem; color:#334155;">Legal Full Name *</label><input type="text" id="name" name="name" class="form-control" style="width:100%; padding:1rem; border:1px solid #cbd5e1; border-radius:12px;" required></div>
                    <div><label for="email" style="display:block; font-weight:700; margin-bottom:0.5rem; color:#334155;">Corporate Email *</label><input type="email" id="email" name="email" class="form-control" style="width:100%; padding:1rem; border:1px solid #cbd5e1; border-radius:12px;" required></div>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                    <div><label for="phone" style="display:block; font-weight:700; margin-bottom:0.5rem; color:#334155;">Direct Phone *</label><input type="tel" id="phone" name="phone" class="form-control" style="width:100%; padding:1rem; border:1px solid #cbd5e1; border-radius:12px;" required></div>
                    <div>
                        <label for="budget" style="display:block; font-weight:700; margin-bottom:0.5rem; color:#334155;">Allocated Budget (INR)</label>
                        <select id="budget" name="budget" class="form-control" style="width:100%; padding:1rem; border:1px solid #cbd5e1; border-radius:12px;">
                            <option value="">Select capital range...</option>
                            <option value="Less than ₹50k">Seed (< ₹50,000)</option>
                            <option value="₹50k - ₹2L">Growth (₹50k - ₹2 Lakhs)</option>
                            <option value="₹2L - ₹5L">Scale (₹2 Lakhs - ₹5 Lakhs)</option>
                            <option value="₹5L+">Enterprise (₹5 Lakhs+)</option>
                        </select>
                    </div>
                </div>
                
                <div><label for="message" style="display:block; font-weight:700; margin-bottom:0.5rem; color:#334155;">Deployment Specifications</label><textarea id="message" name="message" class="form-control" rows="5" style="width:100%; padding:1rem; border:1px solid #cbd5e1; border-radius:12px; font-family:inherit;"></textarea></div>
                
                <div style="margin-top: 1rem;"><button type="submit" style="width: 100%; border-radius: 12px; padding: 1.25rem; background: linear-gradient(135deg, #22c55e, #16a34a); color: #fff; font-size: 1.1rem; font-weight: 800; border: none; cursor: pointer;">Deploy Contact Request</button></div>
            </form>
        </div>
    </div>
</section>
@endsection
