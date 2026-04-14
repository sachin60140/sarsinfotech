@extends('layouts.main')

@section('title', 'Official WhatsApp Business API | Sars Infotech')
@section('description', 'Acquire official WhatsApp Business API endpoints securely integrating highly scaled chatbots, automated CRM ticketing sequences, and highly verified green-tick sender logic.')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {
      "@@type": "Question",
      "name": "How does the WhatsApp API differ from the regular app?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "The standard application securely requires a physical handset strictly limiting scale. The Official API natively strips interface arrays allowing direct CRM coding integration sending millions of programmatic payloads securely globally with zero rate-limit blocks."
      }
    },
    {
      "@@type": "Question",
      "name": "Can I obtain a Verified Green Tick organically?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Yes seamlessly. Once your Meta business array validates completely through our structured onboarding pipeline securely, we push official verification requests unlocking definitive trust metrics immediately internally."
      }
    }
  ]
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Service",
  "serviceType": "WhatsApp API Engineering",
  "provider": {
    "@@type": "Organization",
    "name": "Sars Infotech",
    "url": "{{ url('/') }}"
  },
  "description": "Massive API chatbot implementation officially leveraging Meta structures entirely directly."
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
        background: linear-gradient(to right, #10b981, #34d399);
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
    .deliverable-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px -10px rgba(16,185,129,0.1); border-color: #34d399; }
    .icon-wrapper { width: 50px; height: 50px; background: #ecfdf5; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; }
    .icon-wrapper svg { stroke: #10b981; width: 28px; height: 28px; }
    .deliverable-card h3 { font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem; }
    .deliverable-card p { color: #64748b; line-height: 1.6; font-size: 1rem; margin: 0; }

    /* Modern FAQ Grid */
    .modern-faq { background: #ffffff; padding: 6rem 5%; }
    .faq-container { max-width: 900px; margin: 0 auto; }
    .faq-box { padding: 2rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; margin-bottom: 1.5rem; transition: border 0.3s; }
    .faq-box:hover { border-color: #cbd5e1; }
    .faq-box h3 { font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 0.75rem 0; display: flex; gap: 0.75rem;}
    .faq-box h3 span { color: #10b981; }
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
        content: ''; position: absolute; top: 0; left: 0; right: 0; height: 6px; background: linear-gradient(to right, #10b981, #059669); border-radius: 24px 24px 0 0;
    }
    .form-control { background: #f8fafc; }
</style>
@endsection

@section('content')
<header class="seo-hero">
    <div class="tech-grid" style="mask-image: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%, transparent 100%);"></div>
    <div class="container" style="position: relative; z-index: 10; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
        <h1 style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;">Native Meta Deployments via<br/><span>WhatsApp API</span></h1>
        <p style="text-align: center;">Convert practically billions of global endpoint users cleanly natively fully leveraging directly the Official WhatsApp Business API architecture arrays seamlessly securely.</p>
        
        <div class="hero-metrics">
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Official Meta Integration
            </div>
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Automated Chatbots
            </div>
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Verified Green Tick
            </div>
        </div>
    </div>
</header>

<section class="seo-blueprint">
    <div class="blueprint-grid">
        <div class="blueprint-text">
            <h2>The API Conversion Supercharger</h2>
            <p>Utilizing physical phones strictly destroys enterprise scalability instantly. Connecting directly securely regarding Meta's Official API entirely structurally eliminates all bottlenecks seamlessly allowing limitless robotic transmission streams effortlessly.</p>
            <p>Our infrastructure drastically connects your CRM explicitly securely triggering completely programmatic messages tracking complex engagement vectors definitively perfectly efficiently globally.</p>
            
            <h3 style="margin-top: 2rem; font-size: 1.5rem; font-weight: 800; color: #0f172a;">Conversational Commerce</h3>
            <p>Deploy product catalogs cleanly visibly rendering exact natively within customer chat interfaces aggressively securely facilitating absolutely immediate capital transaction flows.</p>
        </div>
        
        <div class="visual-placeholder">
            <img src="{{ asset('images/whatsapp-api-bot.png') }}" alt="Sars Infotech WhatsApp API Logic Flow">
        </div>
    </div>
</section>

<section class="deliverables-section">
    <div class="container">
        <div class="deliverables-header">
            <h2>Core Execution Infrastructure</h2>
            <p style="color: #64748b; font-size: 1.1rem; margin-top: 0.5rem;">Unleashing the massive native power seamlessly.</p>
        </div>
        
        <div class="deliverables-grid">
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                </div>
                <h3>Intelligent Bot Logic</h3>
                <p>Deploy heavy decision-tree arrays instantly converting support inquiries definitively securely without human labor natively significantly lowering costs strictly.</p>
            </div>
            
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
                <h3>Official Verification</h3>
                <p>Establishing absolute trust dynamically instantly securing highly coveted Green Tick status securely shielding communication integrity perfectly globally natively.</p>
            </div>
            
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                </div>
                <h3>Instant Media Arrays</h3>
                <p>Triggering highly compressed PDF invoices strictly, tracking ticket boarding passes entirely natively fully automating user operational interactions heavily securely.</p>
            </div>
        </div>
    </div>
</section>

<section class="modern-faq">
    <div class="faq-container">
        <h2 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; text-align: center; margin-bottom: 3rem;">Meta API Protocol FAQs</h2>
        
        <div class="faq-box">
            <h3><span>Q.</span> Is it legally permitted strictly to forcefully heavily blast marketing dynamically?</h3>
            <p>Meta enforces strict anti-spam protocol architectures natively definitively. Utilizing the authenticated template engine securely prevents structural account bans ensuring massive delivery safely legally organically.</p>
        </div>
        
        <div class="faq-box">
            <h3><span>Q.</span> Do we fundamentally own our user arrays severely?</h3>
            <p>Absolutely. Implementing API securely specifically allows heavily harvesting opted-in arrays seamlessly aggressively migrating data perfectly seamlessly into your absolute CRM comprehensively securely definitively natively.</p>
        </div>
    </div>
</section>

<section id="enquiry" style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 6rem 0;">
    <div class="container">
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 3rem;">Engage Bot Deployment Engineering</h2>
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
                @csrf <input type="hidden" name="service_interested" value="WhatsApp API Solutions">
                
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
                
                <div style="margin-top: 1rem;"><button type="submit" style="width: 100%; border-radius: 12px; padding: 1.25rem; background: linear-gradient(135deg, #10b981, #059669); color: #fff; font-size: 1.1rem; font-weight: 800; border: none; cursor: pointer;">Deploy WhatsApp API Request</button></div>
            </form>
        </div>
    </div>
</section>
@endsection
