@extends('layouts.main')

@section('title', 'RCS Messaging API & Rich Media Solutions | Sars Infotech')
@section('description', 'Upgrade your native messaging campaigns with Rich Communication Services (RCS). Deploy verified branded profiles, high-resolution media carousels, and interactive buttons globally.')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {
      "@@type": "Question",
      "name": "What is RCS Messaging?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Rich Communication Services (RCS) is the next-generation upgrade to traditional SMS. It brings rich, app-like features natively into your customer's default messaging inbox, such as read receipts, typing indicators, high-resolution image carousels, and verified sender branding."
      }
    },
    {
      "@@type": "Question",
      "name": "How does RCS increase Conversion Rates?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Unlike standard SMS which only allows blue links, RCS allows you to embed interactive suggested action buttons and rich media directly in the chat, reducing friction and drastically increasing click-through rates."
      }
    }
  ]
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Service",
  "serviceType": "RCS Messaging Integration",
  "provider": {
    "@@type": "Organization",
    "name": "Sars Infotech",
    "url": "{{ url('/') }}"
  },
  "description": "Enterprise RCS API offering verified badging, interactive carousels, and comprehensive action buttons directly inside the native Android messaging client."
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
        background: linear-gradient(to right, #eab308, #fef08a);
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
    .deliverable-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px -10px rgba(234,179,8,0.1); border-color: #fef08a; }
    .icon-wrapper { width: 50px; height: 50px; background: #fefce8; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; }
    .icon-wrapper svg { stroke: #eab308; width: 28px; height: 28px; }
    .deliverable-card h3 { font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem; }
    .deliverable-card p { color: #64748b; line-height: 1.6; font-size: 1rem; margin: 0; }

    /* Modern FAQ Grid */
    .modern-faq { background: #ffffff; padding: 6rem 5%; }
    .faq-container { max-width: 900px; margin: 0 auto; }
    .faq-box { padding: 2rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; margin-bottom: 1.5rem; transition: border 0.3s; }
    .faq-box:hover { border-color: #cbd5e1; }
    .faq-box h3 { font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 0.75rem 0; display: flex; gap: 0.75rem;}
    .faq-box h3 span { color: #eab308; }
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
        content: ''; position: absolute; top: 0; left: 0; right: 0; height: 6px; background: linear-gradient(to right, #eab308, #ca8a04); border-radius: 24px 24px 0 0;
    }
    .form-control { background: #f8fafc; }
</style>
@endsection

@section('content')
<header class="seo-hero">
    <div class="tech-grid" style="mask-image: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%, transparent 100%);"></div>
    <div class="container" style="position: relative; z-index: 10; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
        <h1 style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;">Native App Experience via<br/><span>RCS Messaging</span></h1>
        <p style="text-align: center;">Eradicate low-conversion text links. Deploy RCS Communication arrays featuring massive rich media carousels, verified enterprise brand badges, and native checkout triggers natively.</p>
        
        <div class="hero-metrics">
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#eab308" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Verified Brand Badging
            </div>
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#eab308" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> High-Res Carousels
            </div>
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#eab308" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Interactive Call-to-Actions
            </div>
        </div>
    </div>
</header>

<section class="seo-blueprint">
    <div class="blueprint-grid">
        <div class="blueprint-text">
            <h2>What Makes RCS Messages Superior?</h2>
            <p>In classical SMS architecture, corporations are strictly limited to 160 characters of pure text. Blue links are often ignored due to phishing paranoia. Utilizing Google's standardized RCS Messaging protocol, your communication channel transforms completely.</p>
            <p>When you utilize Sars Infotech’s routing API, you inject an interactive, highly visual interface natively onto Android hardware without the user ever required to install a dedicated application.</p>
            
            <h3 style="margin-top: 2rem; font-size: 1.5rem; font-weight: 800; color: #0f172a;">Establish Absolute Trust: The Verified Sender Matrix</h3>
            <p>Trust guarantees high engagement. When a client receives an RCS delivery through our API structure, the typical 10-digit incoming phone number is immediately eclipsed by your official Verified Sender Profile. This entails rendering your high-resolution Brand Logo and authenticated Corporate Name, immediately dispelling spam concerns and commanding attention.</p>
        </div>
        
        <div class="visual-placeholder">
            <img src="{{ asset('images/rcs-interface.png') }}" alt="Sars Infotech RCS Visual Pipeline">
        </div>
    </div>
</section>

<section class="deliverables-section">
    <div class="container">
        <div class="deliverables-header">
            <h2>Dynamic Conversion Arrays</h2>
            <p style="color: #64748b; font-size: 1.1rem; margin-top: 0.5rem;">Stop forcing users to jump between browsers. Implement RCS payloads instead.</p>
        </div>
        
        <div class="deliverables-grid">
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                </div>
                <h3>Rich Media Carousels</h3>
                <p>Display up to 10 product images sequentially in a single swipeable block natively inside the chat thread seamlessly securing conversion instantly.</p>
            </div>
            
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                </div>
                <h3>Suggested Action Payloads</h3>
                <p>Hardcode buttons beneath images like "Add to Cart", "View Map Location", or "Dial Corporate Line" streamlining the client journey securely.</p>
            </div>
            
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                </div>
                <h3>Bi-directional Protocol Trackers</h3>
                <p>Receive critical engagement metrics definitively via deep "Read Receipts" and "Is-Typing" analytics natively mapped to your internal dashboard perfectly.</p>
            </div>
        </div>
    </div>
</section>

<section class="modern-faq">
    <div class="faq-container">
        <h2 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; text-align: center; margin-bottom: 3rem;">RCS Engineering FAQs</h2>
        
        <div class="faq-box">
            <h3><span>Q.</span> Does RCS interface with iOS devices natively?</h3>
            <p>Following Apple's massive global adoption of the RCS standard natively inside iMessage starting with iOS 18, our API ensures proper bi-directional rendering of RCS structures on virtually all modern global hardware arrays seamlessly crossing the Android/Apple ecosystem divide.</p>
        </div>
        
        <div class="faq-box">
            <h3><span>Q.</span> How do we register as a natively Verified Sender?</h3>
            <p>Our dedicated onboarding engineers manage the entire compliance pipeline. We interface securely with global carrier networks to submit your corporate registration tokens to clear compliance instantly, meaning your dedicated Sender Profile renders beautifully securely across global data streams.</p>
        </div>
    </div>
</section>

<section id="enquiry" style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 6rem 0;">
    <div class="container">
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 3rem;">Schedule a Strategic RCS Assessment</h2>
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
                @csrf <input type="hidden" name="service_interested" value="RCS Messaging">
                
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
                
                <div style="margin-top: 1rem;"><button type="submit" style="width: 100%; border-radius: 12px; padding: 1.25rem; background: linear-gradient(135deg, #eab308, #ca8a04); color: #fff; font-size: 1.1rem; font-weight: 800; border: none; cursor: pointer;">Request Developer Access</button></div>
            </form>
        </div>
    </div>
</section>
@endsection
