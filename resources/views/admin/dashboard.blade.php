@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Back to Home --}}
    <div>
        <a href="{{ route('home') }}"
           class="inline-block text-gray-600 hover:text-[#3B82F6] transition-colors mb-4">
            ← Kembali ke Home
        </a>
    </div>

    {{-- Dashboard Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        
        {{-- Total Categories --}}
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow hover:shadow-md transition-shadow">
            <h2 class="text-gray-700 font-semibold mb-2">Total Categories</h2>
            <p class="text-2xl font-bold text-gray-900">{{ $totalCategories }}</p>
        </div>

        {{-- Total Skill Providers --}}
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow hover:shadow-md transition-shadow">
            <h2 class="text-gray-700 font-semibold mb-2">Skill Providers</h2>
            <p class="text-2xl font-bold text-gray-900">{{ $totalProviders }}</p>
        </div>

        {{-- Total Reviews --}}
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow hover:shadow-md transition-shadow">
            <h2 class="text-gray-700 font-semibold mb-2">Reviews</h2>
            <p class="text-2xl font-bold text-gray-900">{{ $totalReviews }}</p>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow">
        <h2 class="text-gray-700 font-semibold mb-4">Quick Actions</h2>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('admin.categories.index') }}" 
               class="bg-[#3B82F6] text-white px-6 py-3 rounded-xl hover:bg-[#2563EB] transition-colors">
                Manage Categories
            </a>
            <a href="{{ route('admin.providers.index') }}" 
               class="bg-[#10B981] text-white px-6 py-3 rounded-xl hover:bg-[#059669] transition-colors">
                Manage Providers
            </a>
        </div>
    </div>

    {{-- Recent Reviews Table --}}
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 border border-gray-200 shadow">
        <h2 class="text-gray-700 font-semibold mb-4">Recent Reviews</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 text-left">Provider</th>
                        <th class="border px-4 py-2 text-left">User</th>
                        <th class="border px-4 py-2 text-left">Rating</th>
                        <th class="border px-4 py-2 text-left">Comment</th>
                        <th class="border px-4 py-2 text-left">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentReviews as $review)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $review->provider->name }}</td>
                        <td class="border px-4 py-2">{{ $review->user->name }}</td>
                        <td class="border px-4 py-2">{{ $review->rating }} ⭐</td>
                        <td class="border px-4 py-2">{{ $review->comment }}</td>
                        <td class="border px-4 py-2">{{ $review->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

