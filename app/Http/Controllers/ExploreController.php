<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SkillProvider;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $providers = SkillProvider::query()
            ->with('category')
            ->when($request->category, function ($q) use ($request) {
                $q->where('category_id', $request->category);
            })
            ->orderBy('rating', 'desc')
            ->paginate(9)
            ->withQueryString();

        return view('explore.index', compact('categories', 'providers'));
    }
}

