<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Sars Infotech</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #f8fafc;
            --text-main: #0f172a;
            --sidebar-bg: #1e293b;
            --sidebar-text: #f1f5f9;
            --accent: #3b82f6;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            margin: 0;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        /* Mobile Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 40;
        }
        
        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
            z-index: 50;
        }
        .sidebar h2 { margin-bottom: 2rem; color: #fff; text-align: center; font-weight: 800; font-size: 1.5rem; }
        
        .nav-item {
            padding: 0.85rem 1rem;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 0.5rem;
            transition: background 0.2s, color 0.2s;
            font-weight: 600;
            display: block;
        }
        .nav-item:hover, .nav-item.active { background: var(--accent); color: #fff; }
        
        /* Dropdown/Group Styling */
        .nav-group {
            margin-bottom: 1rem;
            margin-top: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .nav-group-title {
            color: #94a3b8;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 800;
            margin-bottom: 0.5rem;
            padding-left: 1rem;
        }
        .sub-nav-item {
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 0.25rem;
            font-size: 0.9rem;
            display: block;
            position: relative;
            transition: color 0.2s;
        }
        .sub-nav-item::before {
            content: '';
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 6px;
            background: #475569;
            border-radius: 50%;
        }
        .sub-nav-item:hover, .sub-nav-item.active { color: #fff; }
        .sub-nav-item.active::before { background: var(--accent); }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 2rem 4rem;
            overflow-x: auto;
            max-width: 100%;
        }
        
        /* Mobile Header */
        .mobile-header {
            display: none;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 2rem;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 2rem;
        }
        .menu-toggle {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }
        
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }
        .topbar h1 { margin: 0; font-size: 1.8rem; }
        
        .logout-btn {
            background: #ef4444; color: white;
            border: none; padding: 0.5rem 1.5rem; border-radius: 8px;
            cursor: pointer; font-weight: 600; font-family: inherit;
        }

        /* Generic Admin Utilities */
        .stat-card {
            background: white; padding: 1.5rem; border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); display: inline-block;
            margin-bottom: 2rem; border: 1px solid #e2e8f0;
        }
        .stat-card h3 { color: #64748b; font-size: 0.9rem; margin-bottom: 0.5rem; }
        .stat-card p { font-size: 2rem; font-weight: 800; color: #0f172a; margin: 0; }
        
        /* Responsive CSS */
        @media (max-width: 1024px) {
            .main-content { padding: 2rem; }
        }
        @media (max-width: 768px) {
            body { flex-direction: column; }
            .sidebar {
                position: fixed;
                height: 100vh;
                transform: translateX(-100%);
            }
            .sidebar.show { transform: translateX(0); }
            .sidebar-overlay.show { display: block; }
            
            .mobile-header { display: flex; }
            .topbar { display: none; } /* Hide large topbar on mobile */
            .main-content { padding: 1rem; }
        }
        
        @yield('extra_css')
    </style>
</head>
<body>

    <!-- Mobile Overlay -->
    <div class="sidebar-overlay" id="sidebar-overlay" onclick="toggleSidebar()"></div>

    <!-- Mobile Header -->
    <header class="mobile-header">
        <button class="menu-toggle" onclick="toggleSidebar()">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#0f172a" stroke-width="2.5"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </button>
        <span style="font-weight: 800; font-size: 1.2rem;">@yield('title', 'Dashboard')</span>
        <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="logout-btn" style="padding: 0.4rem 1rem;">Log Out</button>
        </form>
    </header>

    <aside class="sidebar" id="sidebar">
        <h2>Sars Admin</h2>
        
        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Lead Dashboard</a>
        
        <div class="nav-group">
            <div class="nav-group-title">Financial Gateway</div>
            <a href="{{ route('admin.payments') }}" class="sub-nav-item {{ request()->routeIs('admin.payments') ? 'active' : '' }}">Payment Ledger</a>
            <a href="{{ route('admin.payment_links.create') }}" class="sub-nav-item {{ request()->routeIs('admin.payment_links.create') ? 'active' : '' }}">Create Payment Link</a>
            <a href="{{ route('admin.payment_links.sent') }}" class="sub-nav-item {{ request()->routeIs('admin.payment_links.sent') ? 'active' : '' }}">View Sent Links</a>
        </div>
        
        <div class="nav-group">
            <div class="nav-group-title">System Hub</div>
            <a href="{{ route('admin.settings') }}" class="nav-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">Global Settings</a>
            <a href="{{ route('admin.password') }}" class="nav-item {{ request()->routeIs('admin.password') ? 'active' : '' }}">Security & Auth</a>
        </div>
        
        <div style="flex: 1;"></div>
    </aside>

    <main class="main-content">
        <!-- Desktop Topbar -->
        <header class="topbar">
            <h1>@yield('page_header', 'Dashboard Overview')</h1>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Log Out Securely</button>
            </form>
        </header>

        @if(session('success'))
            <div style="background: #dcfce7; color: #166534; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 2rem; font-weight: 600;">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background: #fee2e2; color: #991b1b; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 2rem; font-weight: 600;">
                @foreach($errors->all() as $error)
                    <div style="margin-bottom: 4px;">• {{ $error }}</div>
                @endforeach
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('sidebar-overlay').classList.toggle('show');
        }
    </script>
</body>
</html>
