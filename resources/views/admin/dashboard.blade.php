@extends('layouts.admin')
@section('title', 'Lead Dashboard - Admin')
@section('page_header', 'Lead Management Dashboard')

@section('extra_css')
<style>
    table { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
    th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #e2e8f0; }
    th { background: #f1f5f9; font-weight: 600; color: #475569; }
    tr:last-child td { border-bottom: none; }
    tr:hover { background: #f8fafc; }
    .status-badge {
        background: #dbeafe; color: #1d4ed8; padding: 0.25rem 0.75rem;
        border-radius: 999px; font-size: 0.8rem; font-weight: 600;
    }
</style>
@endsection

@section('content')
<div class="stat-card">
    <h3>Total Leads</h3>
    <p>{{ $leads->count() }}</p>
</div>

<div style="overflow-x: auto; width: 100%;">
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Service</th>
                <th>Budget</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($leads as $lead)
            <tr>
                <td>{{ $lead->created_at->format('M d, Y') }}</td>
                <td>{{ $lead->name }}</td>
                <td>{{ $lead->email }}</td>
                <td>{{ $lead->phone }}</td>
                <td>{{ $lead->service_interested }}</td>
                <td><span style="color:#64748b;">{{ $lead->budget ?? 'N/A' }}</span></td>
                <td><span class="status-badge">{{ ucfirst($lead->status) }}</span></td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 2rem; color: #64748b;">No leads captured yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
