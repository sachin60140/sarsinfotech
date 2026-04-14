<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="EQjLdz5eGTOZz4sD5fyh_5O2RAO2CQNxFUqoZa0D7Og" />
    
    <title>@yield('title', 'Sars Infotech | Best SMS Provider, Bulk SMS, TXN SMS & WhatsApp API')</title>
    <meta name="description" content="@yield('description', 'Sars Infotech is the best SMS provider delivering top-tier enterprise messaging infrastructure. We specialize in Bulk SMS, TXN SMS, WhatsApp API solutions, and Custom Software Development.')">
    <meta name="keywords" content="Bulk SMS, TXN SMS, Best SMS Provider, WhatsApp API, Promotional SMS, Custom Software Development, SEO, SMM, RCS Messaging, Sars Infotech">
    
    <!-- Schema Markup -->
    @section('schema')
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "Sars Infotech",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('logo.png') }}",
      "description": "Premium IT Solutions, Bulk SMS, and Custom Software Development Provider."
    }
    </script>
    @show
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #ffffff;
            --bg-surface: #f8fafc;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --primary: #2563eb; 
            --primary-glow: rgba(37, 99, 235, 0.3);
            --accent: #0ea5e9; 
            --border-light: #e2e8f0;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; scroll-padding-top: 100px; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-secondary);
            overflow-x: clip;
            line-height: 1.7;
            display: flex; flex-direction: column; min-height: 100vh;
        }

        /* Tech Grid Background */
        .tech-grid {
            position: absolute; top: 0; left: 0; right: 0; bottom: 0;
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(15, 23, 42, 0.04) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(15, 23, 42, 0.04) 1px, transparent 1px);
            z-index: 0; pointer-events: none;
            mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 40%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, rgba(0,0,0,1) 40%, transparent 100%);
        }

        /* Modern Navbar */
        nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px); border-bottom: 1px solid var(--border-light);
            position: sticky; top: 0; z-index: 1000;
        }
        .nav-container {
            max-width: 1280px; margin: 0 auto; padding: 1.25rem 1.5rem;
            display: flex; justify-content: space-between; align-items: center;
        }
        .logo { font-size: 1.4rem; font-weight: 800; color: var(--text-primary); text-decoration: none; letter-spacing: -0.5px; display: flex; align-items: center; gap: 0.5rem; }
        .logo-mark { background: linear-gradient(135deg, var(--primary), var(--accent)); width: 22px; height: 22px; border-radius: 6px; display: inline-block; }
        
        .nav-links { display: flex; align-items: center; gap: 2.5rem; }
        .nav-links a { color: var(--text-secondary); text-decoration: none; font-weight: 600; font-size: 0.95rem; transition: color 0.2s; }
        .nav-links a:hover { color: var(--primary); }
        .nav-cta {
            background: var(--text-primary); color: #fff !important;
            padding: 0.5rem 1.5rem; border-radius: 50px; font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s, background 0.2s;
        }
        .nav-cta:hover { transform: translateY(-2px); box-shadow: 0 10px 20px -10px var(--text-primary); background: #000; }

        /* Premium Buttons */
        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem;
            padding: 1.1rem 2.5rem; background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white; text-decoration: none; border-radius: 50px;
            font-weight: 700; font-size: 1rem; border: none; cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 25px -5px var(--primary-glow);
        }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 20px 35px -10px var(--primary-glow); }

        /* Global Sections & Typography */
        .container { width: 100%; max-width: 1280px; margin: 0 auto; padding: 0 1.5rem; position: relative; z-index: 10; }
        
        main { flex: 1; }
        section { padding: 6rem 0; position: relative; }
        .section-label { display: inline-block; padding: 0.4rem 1rem; background: #eff6ff; color: var(--primary); font-weight: 700; font-size: 0.85rem; border-radius: 50px; margin-bottom: 1rem; letter-spacing: 0.5px; text-transform: uppercase; border: 1px solid #bfdbfe; }
        .section-title { font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 1rem; font-weight: 800; color: var(--text-primary); letter-spacing: -1px; line-height: 1.2; }
        .section-subtitle { color: var(--text-secondary); font-size: 1.15rem; margin-bottom: 3.5rem; max-width: 650px; line-height: 1.7; }

        /* Forms */
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.95rem; color: var(--text-primary); }
        .form-control {
            width: 100%; padding: 1rem 1.25rem; font-family: inherit; font-size: 1rem;
            background: var(--bg-surface); border: 1px solid var(--border-light);
            border-radius: 12px; color: var(--text-primary);
            transition: all 0.2s;
        }
        .form-control:focus { outline: none; border-color: var(--primary); background: #fff; box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15); }
        select.form-control { appearance: auto; cursor: pointer; }
        
        .alert-success { background: #dcfce7; color: #166534; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; border: 1px solid #bbf7d0; font-weight: 600; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 12px; margin-bottom: 2rem; border: 1px solid #fecaca; }

        /* Footer */
        footer {
            background-color: var(--text-primary); color: #cbd5e1;
            padding: 3rem 5% 1.5rem; text-align: center;
            border-top: 1px solid var(--border-light);
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            section { padding: 4rem 5%; }
        }

        @yield('extra_styles')
    </style>
</head>
<body>

    <nav>
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo"><span class="logo-mark"></span> Sars Infotech</a>
            <div class="nav-links">
                <a href="{{ route('home') }}#services">Capabilities</a>
                <a href="{{ route('contact') }}" class="nav-cta">Talk to Sales</a>
                @if(auth()->check())
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                @endif
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer style="background: var(--sidebar-bg, #1e293b); color: #f1f5f9; padding: 5rem 0 3rem; margin-top: 4rem;">
        <div class="container">
            <div style="display: flex; flex-wrap: wrap; gap: 3rem; margin-bottom: 3rem; justify-content: space-between;">
                
                <div style="flex: 2 1 300px;">
                    <a href="{{ route('home') }}" class="logo" style="color: #fff; margin-bottom: 1.5rem; display: inline-flex;"><span class="logo-mark"></span> Sars Infotech</a>
                    <p style="color: #94a3b8; font-size: 0.95rem; line-height: 1.8; max-width: 400px;">Delivering the highest tier of Enterprise IT Solutions, proprietary Bulk SMS infrastructure, and structural SEO scaling architectures directly tailored for performance.</p>
                </div>

                <div style="flex: 1.5 1 200px;">
                    <h4 style="color: #fff; font-size: 1.1rem; margin-bottom: 1.5rem; font-weight: 700;">Corporate Headquarters</h4>
                    <p style="color: #cbd5e1; margin-bottom: 0.75rem; display: flex; gap: 0.5rem; align-items: flex-start;">
                        <span style="color: var(--accent); font-size: 1.2rem;">📍</span>
                        {{ $global_setting->address ?? 'Corporate Address Unset' }}
                    </p>
                    <p style="color: #cbd5e1; margin-bottom: 0.75rem; display: flex; gap: 0.5rem; align-items: center;">
                        <span style="color: var(--accent); font-size: 1.2rem;">📞</span>
                        <a href="tel:{{ $global_setting->contact_phone }}" style="color: #cbd5e1; text-decoration: none;">{{ $global_setting->contact_phone ?? 'Phone Unset' }}</a>
                    </p>
                    <p style="color: #cbd5e1; display: flex; gap: 0.5rem; align-items: center;">
                        <span style="color: var(--accent); font-size: 1.2rem;">✉️</span>
                        <a href="mailto:{{ $global_setting->contact_email }}" style="color: #cbd5e1; text-decoration: none;">{{ $global_setting->contact_email ?? 'Email Unset' }}</a>
                    </p>
                </div>

                <div style="flex: 1 1 150px;">
                    <h4 style="color: #fff; font-size: 1.1rem; margin-bottom: 1.5rem; font-weight: 700;">Legal & Resources</h4>
                    <p style="margin-bottom: 0.75rem;"><a href="{{ route('terms') }}" style="color: #cbd5e1; text-decoration: none; transition: color 0.2s;">Terms & Conditions</a></p>
                    <p style="margin-bottom: 0.75rem;"><a href="{{ route('privacy') }}" style="color: #cbd5e1; text-decoration: none; transition: color 0.2s;">Privacy Policy</a></p>
                    <p style="margin-bottom: 0.75rem;"><a href="{{ route('contact') }}" style="color: #cbd5e1; text-decoration: none; transition: color 0.2s;">Contact & Support</a></p>
                </div>

                <div style="flex: 1.5 1 280px; height: 250px; background: #0f172a; border-radius: 12px; overflow: hidden; border: 1px solid #334155;">
                    @if(!empty($global_setting->map_embed_url))
                        <iframe 
                            src="{{ $global_setting->map_embed_url }}" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    @else
                        <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: #64748b; font-size: 0.9rem;">Map Configuration Pending Offline</div>
                    @endif
                </div>
            </div>
            
            <div style="border-top: 1px solid #334155; padding-top: 2rem; text-align: center; color: #64748b; font-size: 0.85rem;">
                <p>&copy; {{ date('Y') }} Sars Infotech Pvt Ltd. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Foolproof smooth scrolling for modern browsers and legacy cases
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href');
                    if (targetId === '#' || targetId === '') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        e.preventDefault();
                        const headerOffset = 100;
                        const elementPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
  
                        window.scrollTo({
                            top: offsetPosition,
                            behavior: "smooth"
                        });
                        history.pushState(null, null, targetId);
                    }
                });
            });
        });
    </script>
</body>
</html>
