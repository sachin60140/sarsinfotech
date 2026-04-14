<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service_interested' => 'required|string',
            'budget' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        $validated['status'] = 'New';
        
        \App\Models\Lead::create($validated);

        return redirect()->back()->with('success', 'Thank you! Your lead has been submitted successfully. We will get back to you shortly.');
    }
}
