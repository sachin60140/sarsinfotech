@extends('layouts.main')

@section('title', 'Robust Cloud Telephony Systems & IVR Solutions | Sars Infotech')
@section('description', 'Virtualize your enterprise communications with our scalable Cloud Telephony systems. Deploy intelligent IVR, Toll-Free routing, and comprehensive call analytics effortlessly.')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {
      "@@type": "Question",
      "name": "How does Cloud Telephony improve enterprise workflow?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Cloud Telephony decouples your communication infrastructure from physical hardware. It enables dynamic call routing, intelligent IVR menus, and centralized analytics natively across distributed corporate environments without traditional PBX limitations."
      }
    },
    {
      "@@type": "Question",
      "name": "Can Cloud Telephony integrate directly into existing CRM architectures?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Absolutely. Our telephony infrastructure acts as an API-first gateway, seamlessly tunneling incoming call data, voice recordings, and live caller ID directly into platforms like Salesforce, HubSpot, or bespoke internal CRMs."
      }
    }
  ]
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Service",
  "serviceType": "Cloud Telephony Integration",
  "provider": {
    "@@type": "Organization",
    "name": "Sars Infotech",
    "url": "{{ url('/') }}"
  },
  "description": "Massive enterprise-level Virtual PBX structuring, multi-level IVR routing, and distributed Toll-Free network architecture deployments."
}
</script>
@endsection

@section('extra_styles')
<style>
    /* Premium Hero */
    .seo-hero { 
        padding: 9rem 5% 7rem; 
        background: linear-gradient(135deg, #020617 0%, #0f172a 100%); 
        color: #f8fafc; 
        position: relative; 
        overflow: hidden; 
        text-align: center; 
        border-bottom: 1px solid #1e293b; 
    }
    .seo-hero h1 { 
        font-size: clamp(2.75rem, 5vw, 4.5rem); 
        font-weight: 800; 
        letter-spacing: -1.5px; 
        line-height: 1.15; 
        margin-bottom: 1.5rem; 
    }
    .seo-hero h1 span { 
        background: linear-gradient(to right, #0ea5e9, #7dd3fc);
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
    .deliverables-section { background: #f0f9ff; padding: 5rem 5% 7rem; border-top: 1px solid #bae6fd; }
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
        border: 1px solid #e0f2fe;
        box-shadow: 0 10px 25px -5px rgba(0,0,0,0.02);
        transition: transform 0.3s;
    }
    .deliverable-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px -10px rgba(14,165,233,0.1); border-color: #7dd3fc; }
    .icon-wrapper { width: 50px; height: 50px; background: #f0f9ff; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; }
    .icon-wrapper svg { stroke: #0ea5e9; width: 28px; height: 28px; }
    .deliverable-card h3 { font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem; }
    .deliverable-card p { color: #64748b; line-height: 1.6; font-size: 1rem; margin: 0; }

    /* Modern FAQ Grid */
    .modern-faq { background: #ffffff; padding: 6rem 5%; }
    .faq-container { max-width: 900px; margin: 0 auto; }
    .faq-box { padding: 2rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; margin-bottom: 1.5rem; transition: border 0.3s; }
    .faq-box:hover { border-color: #cbd5e1; }
    .faq-box h3 { font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 0.75rem 0; display: flex; gap: 0.75rem;}
    .faq-box h3 span { color: #0ea5e9; }
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
        content: ''; position: absolute; top: 0; left: 0; right: 0; height: 6px; background: linear-gradient(to right, #0ea5e9, #0284c7); border-radius: 24px 24px 0 0;
    }
    .form-control { background: #f8fafc; }
</style>
@endsection

@section('content')
<header class="seo-hero">
    <div class="tech-grid" style="mask-image: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%, transparent 100%);"></div>
    <div class="container" style="position: relative; z-index: 10; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
        <h1 style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;">Intelligent Distributed<br/><span>Cloud Telephony</span> Architecture</h1>
        <p style="text-align: center;">Dismantle legacy switchboard bottlenecks. Our team routes high-density incoming call flows utilizing entirely virtualized, secure, and globally accessible PBX hubs.</p>
        
        <div class="hero-metrics">
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0ea5e9" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Omni-Channel Logic
            </div>
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0ea5e9" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Hardware Elimination
            </div>
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0ea5e9" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Uncapped Concurrency
            </div>
        </div>
    </div>
</header>

<section class="seo-blueprint">
    <div class="blueprint-grid">
        <div class="blueprint-text">
            <h2>Accelerating Communications Utilizing Virtual Protocols</h2>
            <p>Physical communication limitations artificially choke massive corporate expansions. Deploying our Cloud Telephony architectures replaces localized PBX fragility with an infinitely scaling, logic-driven cloud backbone.</p>
            <p>We deploy dynamic IVR trees, absolute precision call queueing components, and high-response routing layers specifically tuned for extreme reliability, granting your remote workflows total operational freedom.</p>
            
            <h3 style="margin-top: 2rem; font-size: 1.5rem; font-weight: 800; color: #0f172a;">API-First CRM Synchronization</h3>
            <p>At Sars Infotech, connection visibility is prioritized. Our telephony solutions natively integrate alongside major CRM environments mapping voice records, duration metrics, and agent performance securely, ensuring transparent oversight capabilities over distributed telecom grids natively.</p>
        </div>
        
        <div class="visual-placeholder">
            <img src="{{ asset('images/cloud-telephony-abstract.png') }}" onerror="this.src='https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&q=80&w=1200'" alt="Sars Infotech Intelligent Telephony Cloud Infrastructure">
        </div>
    </div>
</section>

<section class="deliverables-section">
    <div class="container">
        <div class="deliverables-header">
            <h2>Core Infrastructure and Capabilities</h2>
            <p style="color: #64748b; font-size: 1.1rem; margin-top: 0.5rem;">Total virtual dominance over high-throughput communication pipelines.</p>
        </div>
        
        <div class="deliverables-grid">
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                <h3>Toll-Free & Virtual Numbers</h3>
                <p>Establishing massive brand authority utilizing dedicated 1800 sequences, ensuring your audience executes completely zero-cost inbound requests flawlessly.</p>
            </div>
            
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                </div>
                <h3>Interactive Voice Response (IVR)</h3>
                <p>Routing complex high-capacity traffic streams directly into multi-level intelligent department sorting layers effectively dropping wait-time metrics aggressively.</p>
            </div>
            
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
                </div>
                <h3>Live Call Analytics</h3>
                <p>Streaming complete agent recording payloads and geographic density charts sequentially into a high-tier visual operations dashboard perfectly natively.</p>
            </div>
        </div>
    </div>
</section>

<section class="modern-faq">
    <div class="faq-container">
        <h2 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; text-align: center; margin-bottom: 3rem;">Cloud Integration FAQs</h2>
        
        <div class="faq-box">
            <h3><span>Q.</span> Is there significant downtime during PBX migration?</h3>
            <p>Absolutely minimized. Our implementation aggressively structures parallel routing protocols securely before flipping the main DNS payloads, allowing a flawlessly unnoticeable virtual transition exclusively mapped for operations.</p>
        </div>
        
        <div class="faq-box">
            <h3><span>Q.</span> Do virtual agents require proprietary hardware?</h3>
            <p>No native hardware dependencies exist. Our unified arrays pipeline calling events directly across common browser hubs dynamically via WebRTC protocols or mobile gateways natively reducing CapEx structures dramatically.</p>
        </div>
    </div>
</section>

<section id="enquiry" style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 6rem 0;">
    <div class="container">
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 3rem;">Initiate Telephony Sprints</h2>
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
                @csrf <input type="hidden" name="service_interested" value="Cloud Telephony Systems">
                
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
                
                <div style="margin-top: 1rem;"><button type="submit" style="width: 100%; border-radius: 12px; padding: 1.25rem; background: linear-gradient(135deg, #0ea5e9, #0284c7); color: #fff; font-size: 1.1rem; font-weight: 800; border: none; cursor: pointer;">Deploy Contact Request</button></div>
            </form>
        </div>
    </div>
</section>
@endsection
