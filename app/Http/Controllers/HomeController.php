<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkillProvider;

class HomeController extends Controller
{
    public function index()
    {
        // 3 provider dengan rating tertinggi
        $featuredSkills = SkillProvider::orderByDesc('rating')->take(3)->get();

        return view('home', compact('featuredSkills'));
    }

    public function about()
    {

        return view('about');
    }
}


