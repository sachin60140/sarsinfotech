@extends('layouts.main')

@section('extra_styles')
<style>
    .hero {
        min-height: 85vh; display: flex; flex-direction: column;
        justify-content: center; align-items: center; text-align: center;
        padding: 0 5%; border-bottom: 1px solid var(--border-light);
        position: relative; overflow: hidden;
    }
    .hero .section-label { margin-bottom: 1.5rem; }
    .hero h1 { font-size: clamp(3rem, 6vw, 5rem); line-height: 1.1; margin-bottom: 1.5rem; font-weight: 800; color: var(--text-primary); letter-spacing: -2px; max-width: 900px; }
    .hero h1 span { background: linear-gradient(135deg, var(--primary), var(--accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .hero p { font-size: 1.25rem; color: var(--text-secondary); max-width: 700px; margin-bottom: 3rem; line-height: 1.6; }
    .hero-buttons { display: flex; gap: 1rem; align-items: center; justify-content: center; position: relative; z-index: 20; }
    .btn-secondary { display: inline-flex; align-items: center; justify-content: center; padding: 1.1rem 2.5rem; background: var(--bg-surface); color: var(--text-primary); text-decoration: none; border-radius: 50px; font-weight: 700; font-size: 1rem; border: 1px solid var(--border-light); cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
    .btn-secondary:hover { background: #fff; transform: translateY(-3px); box-shadow: 0 10px 20px -10px rgba(0,0,0,0.1); border-color: #cbd5e1; }

    /* Services Grid */
    .services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem; position: relative; z-index: 10; }
    .premium-card {
        background: rgba(255, 255, 255, 0.8); border: 1px solid var(--border-light);
        border-radius: 20px; padding: 2.5rem; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none; display: flex; flex-direction: column; color: inherit;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02); backdrop-filter: blur(10px);
    }
    .premium-card:hover { transform: translateY(-8px); box-shadow: 0 30px 60px -15px rgba(37, 99, 235, 0.1); border-color: rgba(37, 99, 235, 0.3); background: #ffffff; }
    .card-icon { width: 56px; height: 56px; border-radius: 14px; background: linear-gradient(135deg, rgba(37, 99, 235, 0.1), rgba(14, 165, 233, 0.1)); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1.5rem; color: var(--primary); font-weight: 800; border: 1px solid rgba(37, 99, 235, 0.2); }
    .premium-card h3 { font-size: 1.4rem; margin-bottom: 1rem; color: var(--text-primary); font-weight: 800; letter-spacing: -0.5px; }
    .premium-card p { color: var(--text-secondary); margin-bottom: 2rem; line-height: 1.7; flex: 1; }
    .learn-more { color: var(--primary); font-weight: 700; font-size: 0.95rem; display: flex; align-items: center; gap: 0.5rem; margin-top: auto; }
    .learn-more::after { content: '→'; transition: transform 0.2s; }
    .premium-card:hover .learn-more::after { transform: translateX(5px); }

    /* Testimonials */
    #testimonials { background: var(--bg-surface); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light); position: relative; overflow: hidden; }
    .testimonials-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; position: relative; z-index: 10; }
    .testimonial { padding: 3rem; background: #ffffff; border-radius: 20px; border: 1px solid var(--border-light); box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05); }
    .testimonial p { color: var(--text-primary); margin-bottom: 1.5rem; font-size: 1.1rem; line-height: 1.8; font-weight: 500; }
    .testimonial h4 { color: var(--text-secondary); font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 1px; }

    /* Forms */
    .contact-container { max-width: 800px; margin: 0 auto; background: #ffffff; padding: 4rem; border-radius: 24px; border: 1px solid var(--border-light); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.05); }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    .form-group-full { grid-column: 1 / -1; }
    @media (max-width: 600px) { .form-grid { grid-template-columns: 1fr; } .contact-container { padding: 2rem; } }

    /* SEO Content Block */
    .seo-section { background: #ffffff; padding: 6rem 0; border-top: 1px solid var(--border-light); }
    .seo-content { max-width: 900px; margin: 0 auto; font-size: 1.1rem; line-height: 1.8; color: var(--text-secondary); text-align: left; }
    .seo-content h2 { margin-bottom: 2.5rem; text-align: center; font-size: clamp(2rem, 4vw, 2.75rem); color: var(--text-primary); font-weight: 800; letter-spacing: -1px; }
    .seo-content h3 { font-size: 1.4rem; color: var(--text-primary); font-weight: 700; margin: 2.5rem 0 1rem; }
    .seo-content p { margin-bottom: 1.5rem; }
    .seo-content strong { color: var(--text-primary); font-weight: 700; }
</style>
@endsection

@section('content')
<header class="hero">
    <div class="tech-grid"></div>
    <div class="container" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <span class="section-label">Next-Gen IT Infrastructure</span>
        <h1>Architecting Scalable <span>Digital Ecosystems</span></h1>
        <p>Empower your enterprise with elite custom software, high-throughput automated messaging APIS, and data-driven scaling strategies.</p>
        <div class="hero-buttons">
            <a href="#contact" class="btn" style="position: relative; z-index: 50;">Deploy with Us</a>
            <a href="#services" class="btn-secondary" style="position: relative; z-index: 50;">Explore Platform</a>
        </div>
    </div>
</header>

<section id="services">
    <div class="container">
        <div style="text-align: center; position: relative; z-index: 10;">
            <span class="section-label">Capabilities</span>
            <h2 class="section-title">Enterprise-Grade Architecture</h2>
            <p class="section-subtitle" style="margin-inline: auto;">Modular and structurally complete platform solutions designed explicitly for massive enterprise scale.</p>
        </div>
        
        <div class="tech-grid" style="mask-image: radial-gradient(circle at center, rgba(0,0,0,1) 0%, transparent 70%); -webkit-mask-image: radial-gradient(circle at center, rgba(0,0,0,1) 0%, transparent 70%); top: -50%; bottom: -50%;"></div>
        
        <div class="services-grid">
            @foreach($services as $slug => $service)
            <a href="{{ route('service', $slug) }}" class="premium-card">
                <div class="card-icon">{{ substr($service['name'], 0, 1) }}</div>
                <h3>{{ $service['name'] }}</h3>
                <p>{{ $service['desc'] }}</p>
                <div class="learn-more">View Architecture</div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section id="testimonials">
    <div class="container">
        <div style="text-align: center;">
            <span class="section-label">Trust & Scale</span>
            <h2 class="section-title">Powering Market Leaders</h2>
            <p class="section-subtitle" style="margin-inline: auto;">Discover why elite enterprise operations run their digital presence on Sars Infotech.</p>
        </div>
        
        <div class="testimonials-grid">
            <div class="testimonial">
                <p>"Seamless integration and unbelievable throughput. Implementing their WhatsApp API pipeline completely revolutionized our enterprise CRM metrics."</p>
                <h4>Alex Johnson — CTO, TechCorp</h4>
            </div>
            <div class="testimonial">
                <p>"Their technical SEO strategies and structural edge optimizations catapulted us from irrelevance to absolute market dominance in four months."</p>
                <h4>Sarah Williams — VP Marketing, EduBright</h4>
            </div>
            <div class="testimonial">
                <p>"We process millions of messaging queues through their Bulk SMS infrastructure. It is relentlessly fast, completely secure, and infinitely scalable."</p>
                <h4>David Chen — Director, RetailPro</h4>
            </div>
        </div>
    </div>
</section>

<section class="seo-section">
    <div class="container">
        <div class="seo-content">
            <h2>The Industry's Best SMS Provider & Digital Architect</h2>
            
            <p>At Sars Infotech, we understand that enterprise communication requires instant, reliable, and scalable infrastructure. Recognized as the <strong>best SMS provider</strong> for corporate communications, we specialize in high-throughput <strong>Bulk SMS</strong> protocols that guarantee industry-leading delivery rates for your campaigns.</p>
            
            <h3>High-Volume TXN SMS Solutions</h3>
            <p>Transactional messaging demands zero latency and absolute security. Our proprietary <strong>TXN SMS</strong> pipelines are engineered directly for critical banking alerts, OTPs, and enterprise notifications. When delivery speed is non-negotiable, our dedicated routing networks ensure your <strong>TXN SMS</strong> traffic hits the destination instantly, bypassing standard promotional queues entirely.</p>
            
            <h3>Enterprise WhatsApp API & RCC</h3>
            <p>Transform how you interact with your customer base. Our official <strong>WhatsApp API</strong> integrations empower you to deploy AI-driven chatbots, rich media catalogs, and verified business communications natively within the world's most popular messaging app. Transitioning from legacy channels to <strong>RCS messaging</strong> and the <strong>WhatsApp API</strong> dramatically increases conversion rates and user engagement.</p>

            <h3>Intelligent Cloud Telephony</h3>
            <p>Virtualize your enterprise communications with our robust <strong>Cloud Telephony</strong> and IVR solutions. Whether routing thousands of inbound queries through an intelligent Virtual PBX or projecting a localized presence via Toll-Free numbers, our infrastructure allows you to scale communication hubs predictably. Seamlessly integrate call analytics and voice-recording components into your existing CRM architectures.</p>

            <h3>Comprehensive IT & Platform Development</h3>
            <p>Beyond being the top-tier <strong>Bulk SMS</strong> platform natively available, we deploy massive, bespoke architecture through <strong>custom software development</strong>. From scaling cloud ecosystems to implementing aggressive technical <strong>SEO</strong> strategies that dominate Google metrics, Sars Infotech bridges the gap between digital marketing and robust software engineering.</p>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <div style="text-align: center;">
            <span class="section-label">Partnerships</span>
            <h2 class="section-title">Initiate Your Deployment</h2>
            <p class="section-subtitle" style="margin-inline: auto;">Connect with our elite engineering and scaling specialists to architect your digital transformation.</p>
        </div>
        
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

            <form action="{{ route('lead.store') }}" method="POST" class="form-grid">
                @csrf
                
                <div class="form-group form-group-full">
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
                        @foreach($services as $service)
                            <option value="{{ $service['name'] }}">{{ $service['name'] }}</option>
                        @endforeach
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
                
                <div class="form-group form-group-full">
                    <label for="message">Deployment Specifications</label>
                    <textarea id="message" name="message" class="form-control" rows="5" placeholder="Detail your technical requirements or business objectives..."></textarea>
                </div>
                
                <div class="form-group-full" style="margin-top: 1rem;">
                    <button type="submit" class="btn" style="width: 100%; border-radius: 12px; padding: 1.25rem;">Deploy Contact Request</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
