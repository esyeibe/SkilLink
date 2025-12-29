{{-- <x-app-layout>
<div class="max-w-3xl mx-auto py-6">

    <h1 class="text-2xl font-bold mb-2">
        {{ $provider->name }}
    </h1>

    <p class="text-gray-600 mb-1">
        {{ $provider->skill_title }}
    </p>

    <p class="text-gray-500 mb-3">
        {{ $provider->location ?? 'Lokasi tidak tersedia' }}
    </p>

    <p class="mb-4">
        <strong>Kategori:</strong>
        {{ $provider->category->name ?? '-' }}
    </p>

    @if ($provider->image_url)
        <img src="{{ $provider->image_url }}" class="w-40 rounded mb-4">
    @endif

    <p class="mb-4">
        <strong>Bio:</strong><br>
        {{ $provider->bio ?? '-' }}
    </p>

    <p class="mb-2">
        ⭐ Rating: {{ $provider->rating }} ({{ $provider->total_reviews }} reviews)
    </p>

    <p class="mb-2">
        📧 {{ $provider->email ?? '-' }}
    </p>

    <p class="mb-6">
        📞 {{ $provider->phone ?? '-' }}
    </p>

    <a href="/explore" class="text-blue-600 underline">
        ← Kembali ke Explore
    </a>

	 <h2 class="font-semibold mt-4">Skills</h2>
		<ul>
		@foreach ($provider->skills as $skill)
			<li>- {{ $skill->name }}</li>
		@endforeach
		</ul>

		<h2 class="font-semibold mt-4">Reviews</h2>
		@foreach ($provider->reviews as $review)
			<p>"{{ $review->comment }}" — {{ $review->rating }}⭐</p>
		@endforeach

		<hr class="my-6">

<h3 class="text-lg font-bold mb-2">Tulis Review</h3>

@if(auth()->check())
<form method="POST" action="{{ route('provider.review.store', $provider->id) }}">
    @csrf

    <label class="block mb-2">Rating</label>
    <select name="rating" class="border p-2 mb-3">
        <option value="">Pilih rating…</option>
        @for($i=1;$i<=5;$i++)
            <option value="{{ $i }}">{{ $i }} ⭐</option>
        @endfor
    </select>

    <label class="block mb-2">Komentar</label>
    <textarea name="comment" class="border p-2 w-full mb-3"></textarea>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Kirim Review
    </button>
</form>
@else
<p class="text-gray-600">
    Login dulu untuk memberi review.
</p>
@endif


</div>
</x-app-layout> --}}

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Back Button --}}
        <a href="{{ route('explore.index') }}" class="flex items-center space-x-2 text-gray-600 hover:text-[#3B82F6] mb-6">
            <span>←</span>
            <span>Kembali ke Explore</span>
        </a>

        {{-- Profile Header --}}
        <div class="bg-white/60 backdrop-blur-sm rounded-2xl border border-gray-200 overflow-hidden mb-6 p-8">
            <div class="flex flex-col md:flex-row gap-6">
                {{-- Profile Image --}}
                <div class="flex-shrink-0">
                    <img src="{{ asset('storage/' . $provider->image_url) }}" 
                         alt="{{ $provider->name }}"
                         class="w-32 h-32 rounded-2xl object-cover">
                </div>

                {{-- Profile Info --}}
                <div class="flex-1">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <div class="flex items-center space-x-2 mb-1">
                                <h1 class="text-gray-900 text-xl font-bold">{{ $provider->name }}</h1>
                                @if($provider->verified)
                                    <x-lucide-check-circle class="w-6 h-6 text-[#10B981]"/>
                                @endif
                            </div>
                            <p class="text-[#3B82F6] mb-2">{{ $provider->skill_title }}</p>
                        </div>
                    </div>

                    {{-- Rating --}}
                    <div class="flex items-center mb-4">
                        <div class="flex items-center mr-2">
                            @for($i=0; $i<5; $i++)
                                <x-lucide-star 
                                    class="w-5 h-5 {{ $i < floor($provider->rating) ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300' }}" />
                            @endfor
                        </div>
                        <span class="text-gray-900">{{ $provider->rating }}</span>
                        <span class="text-gray-500 ml-1">({{ $provider->total_reviews }} ulasan)</span>
                    </div>

                    {{-- Contact Info --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4 text-gray-600">
                        <div class="flex items-center space-x-2">
                            <x-lucide-map-pin class="w-4 h-4"/>
                            <span>{{ $provider->location ?? '-' }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <x-lucide-mail class="w-4 h-4"/>
                            <span>{{ $provider->email ?? '-' }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <x-lucide-phone class="w-4 h-4"/>
                            <span>{{ $provider->phone ?? '-' }}</span>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-wrap gap-3">
                        <a href="https://wa.me/{{ $provider->phone }}?text=Halo {{ $provider->name }}, saya tertarik dengan layanan Anda" target="_blank"
                           class="bg-[#10B981] text-white px-6 py-2.5 rounded-full hover:bg-[#059669] transition-colors flex items-center space-x-2">
                            <x-lucide-message-circle class="w-4 h-4"/>
                            <span>Hubungi via WhatsApp</span>
                        </a>
                        <button class="bg-[#3B82F6] text-white px-6 py-2.5 rounded-full hover:bg-[#2563EB] transition-colors flex items-center space-x-2">
                            <x-lucide-calendar class="w-4 h-4"/>
                            <span>Jadwalkan Konsultasi</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bio Section --}}
        <div class="bg-white/60 backdrop-blur-sm rounded-2xl border border-gray-200 p-8 mb-6">
            <h2 class="text-gray-900 text-lg font-semibold mb-4">Tentang</h2>
            <p class="text-gray-600 leading-relaxed">{{ $provider->bio ?? '-' }}</p>
        </div>

        {{-- Skills Section --}}
        <div class="bg-white/60 backdrop-blur-sm rounded-2xl border border-gray-200 p-8 mb-6">
            <h2 class="text-gray-900 text-lg font-semibold mb-6">Keahlian</h2>
            <div class="space-y-4">
                @foreach ($provider->skills as $skill)
                    <div class="bg-white rounded-xl p-5 border border-gray-200 hover:border-[#3B82F6] transition-colors">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-gray-900 font-medium">{{ $skill->name }}</h3>
                            <span class="text-[#10B981] bg-[#10B981]/10 px-3 py-1 rounded-full">{{ $skill->experience ?? '-' }}</span>
                        </div>
                        <p class="text-gray-600">{{ $skill->description ?? '-' }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Reviews Section --}}
        <div class="bg-white/60 backdrop-blur-sm rounded-2xl border border-gray-200 p-8 mb-6">
            <h2 class="text-gray-900 text-lg font-semibold mb-6">Ulasan ({{ $provider->total_reviews }})</h2>
            <div class="space-y-6">
                @foreach ($provider->reviews as $review)
                    <div class="border-b border-gray-200 last:border-0 pb-6 last:pb-0">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <h4 class="text-gray-900 font-medium">{{ $review->user->name ?? 'Anonim' }}</h4>
                                <div class="flex items-center mt-1">
                                    @for($i=0;$i<5;$i++)
                                        <x-lucide-star class="w-4 h-4 {{ $i < $review->rating ? 'text-yellow-400 fill-yellow-400' : 'text-gray-300' }}"/>
                                    @endfor
                                </div>
                            </div>
                            <span class="text-gray-500">{{ $review->created_at->format('d M Y') }}</span>
                        </div>
                        <p class="text-gray-600">{{ $review->comment }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Write Review --}}
        <div class="bg-white/60 backdrop-blur-sm rounded-2xl border border-gray-200 p-8">
            <h3 class="text-lg font-bold mb-4">Tulis Review</h3>
            @auth
                <form method="POST" action="{{ route('provider.review.store', $provider->id) }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block mb-2 font-medium">Rating</label>
                        <select name="rating" class="border rounded p-2 w-full">
                            <option value="">Pilih rating…</option>
                            @for($i=1;$i<=5;$i++)
                                <option value="{{ $i }}">{{ $i }} ⭐</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 font-medium">Komentar</label>
                        <textarea name="comment" class="border rounded p-2 w-full" rows="4"></textarea>
                    </div>
                    <button type="submit" class="bg-[#3B82F6] text-white px-4 py-2 rounded hover:bg-[#2563EB] transition-colors">
                        Kirim Review
                    </button>
                </form>
            @else
                <p class="text-gray-600">Login dulu untuk memberi review.</p>
            @endauth
        </div>

    </div>
</div>
@endsection
