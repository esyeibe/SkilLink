<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillProvider;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SkillProviderController extends Controller
{
    public function index()
    {
        $providers = SkillProvider::latest()->paginate(10);
        return view('admin.providers.index', compact('providers'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.providers.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'skill_title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|image|max:2048',
            'verified' => 'nullable|boolean',
            'rating' => 'nullable|numeric|min:0|max:5',
            'total_reviews' => 'nullable|integer|min:0',
            'bio' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
        ]);

        $data = $request->all();

        if($request->hasFile('image')) {
            $data['image_url'] = $request->file('image')->store('providers', 'public');
        }

        SkillProvider::create($data);

        return redirect()->route('admin.providers.index')->with('success', 'Provider added successfully.');
    }

    public function edit(SkillProvider $provider)
    {
        $categories = Category::all();
        return view('admin.providers.edit', compact('provider', 'categories'));
    }

    public function update(Request $request, SkillProvider $provider)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'skill_title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|image|max:2048',
            'verified' => 'nullable|boolean',
            'rating' => 'nullable|numeric|min:0|max:5',
            'total_reviews' => 'nullable|integer|min:0',
            'bio' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
        ]);

        $data = $request->all();

        if($request->hasFile('image')) {
            // hapus gambar lama kalau ada
            if($provider->image_url 
                && Storage::disk('public')->exists($provider->image_url)
                && !str_starts_with($provider->image_url, 'dummy/')) 
            {
                Storage::disk('public')->delete($provider->image_url);
            }

            $data['image_url'] = $request->file('image')->store('providers', 'public');
        }

        $provider->update($data);

        return redirect()->route('admin.providers.index')->with('success', 'Provider updated successfully.');
    }

    public function destroy(SkillProvider $provider)
    {
        // hapus gambar lama kalau ada
        if($provider->image_url 
            && Storage::disk('public')->exists($provider->image_url)
            && !str_starts_with($provider->image_url, 'dummy/')) 
        {
            Storage::disk('public')->delete($provider->image_url);
        }


        $provider->delete();

        return redirect()->route('admin.providers.index')
                        ->with('success', 'Provider deleted successfully.');
    }
}
