{{-- <x-app-layout>
<div class="max-w-6xl mx-auto px-4 py-8">

    <h1 class="text-2xl font-bold mb-4">Explore Skill Providers</h1>

    <form method="GET" class="mb-6">
        <select name="category"
                class="border rounded px-3 py-2"
                onchange="this.form.submit()">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ request('category') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </form>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($providers as $p)
        <div class="border rounded-lg p-4 bg-white shadow">

            <img src="{{ asset('storage/' . $p->image_url) }}"
                 class="w-full h-40 object-cover rounded mb-3">

            <h2 class="font-semibold text-lg">{{ $p->name }}</h2>
            <p class="text-sm text-gray-600">{{ $p->skill_title }}</p>

            <p class="mt-1 text-sm text-gray-500">
                {{ $p->location }}
            </p>

            <p class="mt-1 text-sm">
                ⭐ {{ number_format($p->rating, 1) }}
                ({{ $p->total_reviews }} reviews)
            </p>

            <a href="{{ route('provider.show', $p->id) }}"
               class="inline-block mt-3 text-blue-600 hover:underline">
               Lihat Detail
            </a>
        </div>
        @endforeach

    </div>

    <div class="mt-6">
        {{ $providers->links() }}
    </div>

</div>
</x-app-layout> --}}

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Explore Skill Providers</h1>

        <div class="flex flex-col md:flex-row gap-8">
            {{-- Sidebar Kategori --}}
            <aside class="md:w-64 space-y-6">
                <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-gray-200">
                    <h3 class="text-gray-900 mb-4 font-semibold">Kategori</h3>
                    <div class="space-y-2">
                        <form method="GET">
                            <select name="category" class="w-full border rounded-lg p-2" onchange="this.form.submit()">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </aside>

            {{-- Grid Providers --}}
            <div class="flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($providers as $p)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
                        <img src="{{ asset('storage/' . $p->image_url) }}"
                             class="w-full h-48 object-cover">

                        <div class="p-4">
                            <h2 class="font-semibold text-lg text-gray-900">{{ $p->name }}</h2>
                            <p class="text-sm text-gray-600 mb-1">{{ $p->skill_title }}</p>
                            <p class="text-sm text-gray-500 mb-1">{{ $p->location }}</p>
                            <p class="text-sm mb-2">
                                ⭐ {{ number_format($p->rating, 1) }}
                                ({{ $p->total_reviews }} reviews)
                            </p>
                            <a href="{{ route('provider.show', $p->id) }}"
                               class="inline-block text-[#3B82F6] hover:underline font-medium">
                               Lihat Detail
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-8">
                    {{ $providers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

