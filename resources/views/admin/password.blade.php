@extends('layouts.admin')
@section('title', 'Security - Admin')
@section('page_header', 'Security Settings')

@section('extra_css')
<style>
    .form-container {
        background: white; padding: 2.5rem; border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;
        max-width: 600px;
    }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #334155; }
    .form-control { width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 8px; font-family: inherit; font-size: 1rem; background: #f8fafc; transition: border-color 0.2s; box-sizing: border-box; }
    .form-control:focus { outline: none; border-color: var(--accent); background: #ffffff; }
    .btn-submit { background: #3b82f6; color: white; border: none; padding: 0.75rem 2rem; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 1rem; transition: background 0.2s; }
    .btn-submit:hover { background: #2563eb; }
</style>
@endsection

@section('content')
<div class="form-container">
    <form action="{{ route('admin.password.update') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required placeholder="Enter current password...">
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" class="form-control" required placeholder="Minimum 8 characters...">
        </div>
        
        <div class="form-group">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required placeholder="Retype new password...">
        </div>
        
        <button type="submit" class="btn-submit">Update Password Securely</button>
    </form>
</div>
@endsection
