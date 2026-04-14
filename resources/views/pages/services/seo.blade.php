@extends('layouts.main')

@section('title', 'Enterprise Technical SEO Services | Sars Infotech Pvt Ltd')
@section('description', 'Skyrocket organic Google rankings dramatically. We execute highly structural technical SEO strategies systematically bridging massive domain authority metrics explicitly scaling traffic seamlessly.')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {
      "@@type": "Question",
      "name": "How is Technical SEO substantially varying from generic optimization frameworks?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Technical SEO strictly audits structural DOM elements like rendering latency, JSON-LD Schema schema arrays, indexing logic, and server response payloads cleanly satisfying Google's massive algorithmic backend securely."
      }
    },
    {
      "@@type": "Question",
      "name": "What timeline defines typical SEO ranking matrices strictly?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Google operates upon massive delay parameters natively. Depending strictly upon domain velocity structurally, competitive rankings organically manifest fully across robust 3 to 6-month continuous integration sprints."
      }
    }
  ]
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Service",
  "serviceType": "Technical SEO Ranking Systems",
  "provider": {
    "@@type": "Organization",
    "name": "Sars Infotech Pvt Ltd",
    "url": "{{ url('/') }}"
  },
  "description": "Massive organic search volume acquisition protocols systematically leveraging deep linking, content restructuring, and speed optimizations natively."
}
</script>
@endsection

@section('extra_styles')
<style>
    /* Premium SEO Hero */
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
        background: linear-gradient(to right, #3b82f6, #60a5fa);
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
        border: 1px solid rgba(255, 255, 255, 0.1);
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
    .deliverable-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px -10px rgba(37,99,235,0.1); border-color: #bfdbfe; }
    .icon-wrapper { width: 50px; height: 50px; background: #eff6ff; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; }
    .icon-wrapper svg { stroke: #2563eb; width: 28px; height: 28px; }
    .deliverable-card h3 { font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem; }
    .deliverable-card p { color: #64748b; line-height: 1.6; font-size: 1rem; margin: 0; }

    /* Modern FAQ Grid */
    .modern-faq { background: #ffffff; padding: 6rem 5%; }
    .faq-container { max-width: 900px; margin: 0 auto; }
    .faq-box { padding: 2rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 16px; margin-bottom: 1.5rem; transition: border 0.3s; }
    .faq-box:hover { border-color: #cbd5e1; }
    .faq-box h3 { font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 0.75rem 0; display: flex; gap: 0.75rem;}
    .faq-box h3 span { color: #3b82f6; }
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
        content: ''; position: absolute; top: 0; left: 0; right: 0; height: 6px; background: linear-gradient(to right, #2563eb, #3b82f6); border-radius: 24px 24px 0 0;
    }
    .form-control { background: #f8fafc; }
</style>
@endsection

@section('content')
<header class="seo-hero">
    <div class="tech-grid" style="mask-image: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%, transparent 100%);"></div>
    <div class="container" style="position: relative; z-index: 10; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">
        <h1 style="text-align: center; width: 100%; margin-left: auto; margin-right: auto;">Aggressive Google Ranking via<br/><span>High-End Technical SEO</span></h1>
        <p style="text-align: center;">Shatter organic traffic ceilings definitively. We rapidly enforce high-tier algorithmic strategies systematically locking competitive keyword dominance directly to your domain.</p>
        
        <div class="hero-metrics">
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> JSON-LD Schemas
            </div>
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> <1s Server Response
            </div>
            <div class="metric-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg> Authority Link-Building
            </div>
        </div>
    </div>
</header>

<section class="seo-blueprint">
    <div class="blueprint-grid">
        <div class="blueprint-text">
            <h2>Structuring the Algorithmic Blueprint natively</h2>
            <p>Deploying a beautiful website represents strictly zero business value if massive Google algorithmic spiders violently reject its rendering structure.</p>
            <p>Mastering Enterprise SEO at <strong>Sars Infotech Pvt Ltd</strong> demands severe technical synchronization. We systematically map core DOM nodes, inject highly correlated semantic entity clusters, and hard-code structural HTML frameworks clearly defining domain relevance definitively globally.</p>
            
            <h3 style="margin-top: 2rem; font-size: 1.5rem; font-weight: 800; color: #0f172a;">Domain Authority Matrix</h3>
            <p>Content operates exclusively as raw potential. Domain Authority natively acts as the primary kinetic velocity force scaling your keyword positions gracefully. Our pipeline builds massive infrastructure explicitly safeguarding your index against Core Algorithm deployments.</p>
        </div>
        
        <div class="visual-placeholder">
            <img src="{{ asset('images/seo-dashboard.png') }}" alt="Sars Infotech SEO Algorithmic Framework Deployment">
        </div>
    </div>
</section>

<section class="deliverables-section">
    <div class="container">
        <div class="deliverables-header">
            <h2>Core Infrastructure Deliverables</h2>
            <p style="color: #64748b; font-size: 1.1rem; margin-top: 0.5rem;">The underlying matrix driving our Search Engine Architecture.</p>
        </div>
        
        <div class="deliverables-grid">
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                </div>
                <h3>Core Web Vitals Mapping</h3>
                <p>Decimating render-blocking CSS structures severely explicitly ensuring LCP (Largest Contentful Paint) times crush competition gracefully natively.</p>
            </div>
            
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h3>JSON-LD Schema Logic</h3>
                <p>Systematically hard-coding strictly defined data arrays defining Organization matrices, FAQs, and explicit Product entities natively to Google Indexers.</p>
            </div>
            
            <div class="deliverable-card">
                <div class="icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                </div>
                <h3>Semantic Topology Grids</h3>
                <p>Executing massive semantic mapping grids thoroughly targeting aggressive long-tail volume variables flawlessly spanning multi-level site silos effectively.</p>
            </div>
        </div>
    </div>
</section>

<section class="modern-faq">
    <div class="faq-container">
        <h2 style="font-size: 2.5rem; font-weight: 800; color: #0f172a; text-align: center; margin-bottom: 3rem;">Executive FAQs</h2>
        
        <div class="faq-box">
            <h3><span>Q.</span> Is absolute First-Page ranking mechanically guaranteed?</h3>
            <p>Guarantees strictly denote scam operations inherently accurately. However, implementing our aggressive Enterprise SEO mapping structurally drives mathematical inevitability properly pushing DOM variables seamlessly toward ultimate positional tracking continuously.</p>
        </div>
        
        <div class="faq-box">
            <h3><span>Q.</span> What velocity timeline governs Search Engine Ranking variables?</h3>
            <p>Google evaluates structural integrity strictly upon heavy validation delays properly. While indexing manifests rapidly, pure aggressive keyword velocity operates organically over robust 3 to 6-month continuous integration deployments.</p>
        </div>
    </div>
</section>

<section id="enquiry" style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 6rem 0;">
    <div class="container">
        <h2 style="text-align: center; font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 3rem;">Initialize SEO Deployment</h2>
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
                @csrf <input type="hidden" name="service_interested" value="SEO Services">
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                    <div><label for="name" style="display:block; font-weight:700; margin-bottom:0.5rem; color:#334155;">Executive Full Name *</label><input type="text" id="name" name="name" class="form-control stripe-input" style="width:100%; padding:1rem; border:1px solid #cbd5e1; border-radius:12px;" required></div>
                    <div><label for="email" style="display:block; font-weight:700; margin-bottom:0.5rem; color:#334155;">Corporate Email *</label><input type="email" id="email" name="email" class="form-control" style="width:100%; padding:1rem; border:1px solid #cbd5e1; border-radius:12px;" required></div>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                    <div><label for="phone" style="display:block; font-weight:700; margin-bottom:0.5rem; color:#334155;">Direct Phone Contact *</label><input type="tel" id="phone" name="phone" class="form-control" style="width:100%; padding:1rem; border:1px solid #cbd5e1; border-radius:12px;" required></div>
                    <div>
                        <label for="budget" style="display:block; font-weight:700; margin-bottom:0.5rem; color:#334155;">Allocated ARR Budget (INR)</label>
                        <select id="budget" name="budget" class="form-control" style="width:100%; padding:1rem; border:1px solid #cbd5e1; border-radius:12px;">
                            <option value="">Select capital range...</option>
                            <option value="Less than ₹50k">Seed (< ₹50,000)</option>
                            <option value="₹50k - ₹2L">Growth (₹50k - ₹2 Lakhs)</option>
                            <option value="₹2L - ₹5L">Scale (₹2 Lakhs - ₹5 Lakhs)</option>
                            <option value="₹5L+">Enterprise (₹5 Lakhs+)</option>
                        </select>
                    </div>
                </div>
                
                <div><label for="message" style="display:block; font-weight:700; margin-bottom:0.5rem; color:#334155;">Domain URLs & Specific Requirements</label><textarea id="message" name="message" class="form-control" rows="5" style="width:100%; padding:1rem; border:1px solid #cbd5e1; border-radius:12px; font-family:inherit;"></textarea></div>
                
                <div style="margin-top: 1rem;"><button type="submit" style="width: 100%; border-radius: 12px; padding: 1.25rem; background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #fff; font-size: 1.1rem; font-weight: 800; border: none; cursor: pointer;">Deploy Project Request</button></div>
            </form>
        </div>
    </div>
</section>
@endsection
