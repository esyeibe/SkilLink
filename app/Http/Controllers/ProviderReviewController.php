<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProviderReview;
use App\Models\SkillProvider;
use Illuminate\Support\Facades\Auth;

class ProviderReviewController extends Controller
{
    public function store(Request $request, $providerId)
    {
        $validated = $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        ProviderReview::create([
            'provider_id' => $providerId,
            'user_id' => Auth::id(), // sementara wajib login
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);

        // (opsional) update agregat rating
        $provider = SkillProvider::with('reviews')->find($providerId);
        $provider->rating = $provider->reviews->avg('rating');
        $provider->total_reviews = $provider->reviews->count();
        $provider->save();

        return back()->with('success', 'Review berhasil dikirim');
    }
}
