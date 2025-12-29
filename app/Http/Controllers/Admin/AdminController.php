<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SkillProvider;
use App\Models\ProviderReview;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalCategories = Category::count();
        $totalProviders = SkillProvider::count();
        $totalReviews = ProviderReview::count();
        $recentReviews = ProviderReview::with(['provider', 'user'])
                            ->latest()
                            ->take(5)
                            ->get();

        return view('admin.dashboard', compact(
            'totalCategories',
            'totalProviders',
            'totalReviews',
            'recentReviews'
        ));
    }
}

