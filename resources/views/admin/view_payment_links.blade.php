@extends('layouts.admin')
@section('title', 'View Sent Links - Admin')
@section('page_header', 'Broadcasted Payment Links')

@section('extra_css')
<style>
    .filter-card {
        background: white; padding: 1.5rem 2rem; border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;
        margin-bottom: 2rem;
    }
    .filter-form {
        display: flex; gap: 1rem; align-items: flex-end; flex-wrap: wrap;
    }
    .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155; font-size: 0.85rem; }
    .form-control { padding: 0.65rem; border: 1px solid #cbd5e1; border-radius: 8px; font-family: inherit; font-size: 0.9rem; background: #f8fafc; }
    .btn-filter, .btn-reset { 
        padding: 0.65rem 1.5rem; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 0.9rem; border: none; height: 38px;
    }
    .btn-filter { background: #3b82f6; color: white; }
    .btn-reset { background: #f1f5f9; color: #475569; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; border: 1px solid #cbd5e1; }

    table { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
    th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #e2e8f0; font-size: 0.9rem; }
    th { background: #f1f5f9; font-weight: 600; color: #475569; }
    tr:last-child td { border-bottom: none; }
    tr:hover { background: #f8fafc; }
    
    .status-badge { padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.75rem; font-weight: 700; display: inline-block; text-transform: uppercase; }
    .status-created { background: #dbeafe; color: #1e40af; }
    .status-paid { background: #dcfce7; color: #166534; }
    .status-expired { background: #fee2e2; color: #991b1b; }
    
    .copy-btn {
        background: #f1f5f9; border: 1px solid #cbd5e1; color: #475569;
        font-weight: 600; font-size: 0.75rem; border-radius: 4px; padding: 4px 8px; cursor: pointer; transition: all 0.2s;
    }
    .copy-btn:hover { background: #e2e8f0; color: #0f172a; }
</style>
@endsection

@section('content')

<div class="filter-card">
    <form action="{{ route('admin.payment_links.sent') }}" method="GET" class="filter-form">
        <div class="form-group">
            <label for="start_date">Created From</label>
            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>
        <div class="form-group">
            <label for="end_date">Created To</label>
            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>
        <div>
            <button type="submit" class="btn-filter">Filter Links</button>
            <a href="{{ route('admin.payment_links.sent') }}" class="btn-reset">Reset</a>
        </div>
    </form>
</div>

<div style="overflow-x: auto; width: 100%; border-radius: 12px; padding-bottom: 2rem;">
    <table style="min-width: 800px;">
        <thead>
            <tr>
                <th>Created Timestamp</th>
                <th>Routing Logic</th>
                <th>Capital Amount</th>
                <th>Status Protocol</th>
                <th>Gateway Direct URL</th>
            </tr>
        </thead>
        <tbody>
            @forelse($links as $link)
            <tr>
                <td style="color: #64748b; font-size: 0.8rem;">
                    {{ $link->created_at->format('M d, Y') }}<br/>
                    <span style="font-weight:600; color:#0f172a;">{{ $link->created_at->format('H:i') }}</span>
                </td>
                <td>
                    <span style="display: block; font-weight: 700; color:#1e293b; margin-bottom: 2px;">{{ $link->customer_name }}</span>
                    <span style="color: #64748b; font-size: 0.8rem;">📞 {{ $link->customer_mobile }}</span><br/>
                    <span style="color: #475569; font-size: 0.8rem;">Ref: {{ Str::limit($link->description, 25) }}</span>
                </td>
                <td style="font-weight: 800; color: #166534;">₹{{ number_format($link->amount, 2) }}</td>
                <td>
                    <span class="status-badge status-{{ strtolower($link->status) }}">{{ $link->status }}</span>
                    @if($link->razorpay_link_id)
                    <div style="margin-top: 4px; font-family: monospace; font-size: 0.7rem; color: #94a3b8;">{{ $link->razorpay_link_id }}</div>
                    @endif
                </td>
                <td>
                    @if($link->payment_url)
                    <div style="display: flex; gap: 0.5rem; align-items: center;">
                        <input type="text" readonly value="{{ $link->payment_url }}" style="font-size: 0.75rem; padding: 4px; width: 180px; border: 1px solid #cbd5e1; border-radius: 4px; background: #f8fafc; color: #475569;">
                        <button class="copy-btn" onclick="navigator.clipboard.writeText('{{ $link->payment_url }}').then(()=> { this.innerText='✓ Copied'; setTimeout(()=> this.innerText='Copy', 2000); })">Copy</button>
                    </div>
                    @else
                    <span style="color: #94a3b8; font-size: 0.8rem;">Processing</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 4rem; color: #64748b;">No active Razorpay Payment Link architecture initialized matching the filters natively.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
