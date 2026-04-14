@extends('layouts.admin')
@section('title', 'Payment Ledger - Admin')
@section('page_header', 'Financial Payments Ledger')

@section('extra_css')
<style>
    table { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; min-width: 800px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
    th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #e2e8f0; font-size: 0.95rem; }
    th { background: #f1f5f9; font-weight: 600; color: #475569; }
    tr:last-child td { border-bottom: none; }
    tr:hover { background: #f8fafc; }
    .status-badge { padding: 0.25rem 0.75rem; border-radius: 999px; font-size: 0.8rem; font-weight: 600; display: inline-block; }
    .status-paid { background: #dcfce7; color: #166534; }
    .status-pending { background: #fef3c7; color: #b45309; }
    .status-failed { background: #fee2e2; color: #991b1b; }
</style>
@endsection

@section('content')
<div class="stat-card">
    <h3>Total Paid Revenue captured</h3>
    <p>₹ {{ number_format($payments->where('status', 'paid')->sum('amount'), 2) }}</p>
</div>

<div style="overflow-x: auto; width: 100%; border-radius: 12px;">
    <table>
        <thead>
            <tr>
                <th>Timestamp</th>
                <th>Client Designation</th>
                <th>Contact Infrastructure</th>
                <th>Remittance Amount</th>
                <th>Invoice / Subject</th>
                <th>Gateway Handshake IDs</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
            <tr>
                <td style="color: #475569; font-size: 0.85rem;">{{ $payment->created_at->format('M d, Y') }}<br/><span style="font-weight:600; color:#0f172a;">{{ $payment->created_at->format('H:i') }}</span></td>
                <td style="font-weight: 700; color:#1e293b;">{{ $payment->name }}</td>
                <td style="font-size: 0.85rem;">
                    <span style="display: block; color: #2563eb; font-weight: 600;">{{ $payment->email }}</span>
                    <span style="color: #64748b;">📞 {{ $payment->mobile }}</span>
                </td>
                <td style="font-weight: 800; color: #166534; font-size:1.1rem;">₹ {{ number_format($payment->amount, 2) }}</td>
                <td>
                    <span style="display: block; color: #0f172a; font-size: 0.85rem; font-weight:600;">{{ $payment->invoice_number ? 'INV: ' . $payment->invoice_number : 'No Invoice Assigned' }}</span>
                    <span style="color: #64748b; font-size: 0.8rem;">Note: {{ $payment->remarks ?? 'N/A' }}</span>
                </td>
                <td>
                    <span style="display: block; margin-bottom: 4px; font-family: monospace; font-size: 0.75rem; color: #0f172a; background: #e2e8f0; padding: 2px 6px; border-radius: 4px; border-left: 2px solid #3b82f6;">ORD: {{ $payment->razorpay_order_id ?? 'Pending' }}</span>
                    <span style="display: block; font-family: monospace; font-size: 0.75rem; color: #0f172a; background: #e2e8f0; padding: 2px 6px; border-radius: 4px; border-left: 2px solid #10b981;">TXN: {{ $payment->razorpay_payment_id ?? 'Pending' }}</span>
                </td>
                <td>
                    <span class="status-badge status-{{ strtolower($payment->status) }}">{{ strtoupper($payment->status) }}</span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 4rem; color: #64748b;">No corporate transactions registered natively within the ledger.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
