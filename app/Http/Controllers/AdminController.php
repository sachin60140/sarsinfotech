<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Setting;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $leads = Lead::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('leads'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function settings()
    {
        $setting = Setting::first() ?? new Setting();
        return view('admin.settings', compact('setting'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'address' => 'nullable|string',
            'map_embed_url' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'razorpay_key' => 'nullable|string',
            'razorpay_secret' => 'nullable|string',
        ]);

        $setting = Setting::first() ?? new Setting();
        $setting->address = $request->address;
        $setting->map_embed_url = $request->map_embed_url;
        $setting->contact_email = $request->contact_email;
        $setting->contact_phone = $request->contact_phone;
        
        if($request->filled('razorpay_key')) {
            $setting->razorpay_key = $request->razorpay_key;
        }
        if($request->filled('razorpay_secret')) {
            $setting->razorpay_secret = $request->razorpay_secret;
        }
        
        $setting->save();

        return back()->with('success', 'Global platform settings updated continuously.');
    }

    public function password()
    {
        return view('admin.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Administrator password updated securely.');
    }
}
