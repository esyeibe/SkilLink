<?php

namespace App\Http\Controllers;

use App\Models\SkillProvider as Provider;  // pastikan modelnya sesuai nama
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function show($id)
    {
        // $provider = Provider::with('category')->findOrFail($id);        
        $provider = Provider::with(['category', 'skills', 'reviews'])
        ->findOrFail($id);
        return view('providers.show', compact('provider'));
    }
}

