@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white/60 backdrop-blur-sm rounded-2xl border border-gray-200 p-8 shadow-lg">
            
            {{-- Header --}}
            <h1 class="text-gray-900 text-3xl font-bold mb-6">Tentang Skillink</h1>
            
            {{-- Intro --}}
            <div class="space-y-4 text-gray-700 leading-relaxed">
                <p>
                    Skillink adalah platform yang menghubungkan orang-orang dengan keahlian,
                    hobi, atau layanan serupa di sekitar mereka, dan membantu individu yang
                    terampil menjangkau lebih banyak klien potensial.
                </p>
                <p>
                    Kami percaya bahwa setiap orang memiliki keahlian unik yang dapat dibagikan
                    dan setiap komunitas memiliki talenta luar biasa yang perlu ditemukan.
                    Skillink memudahkan proses ini dengan menyediakan platform yang aman,
                    terpercaya, dan mudah digunakan.
                </p>
            </div>

            {{-- Why Skillink --}}
            <h3 class="text-gray-900 text-xl font-semibold mt-8 mb-4">Mengapa Skillink?</h3>
            <ul class="list-disc list-inside space-y-2 text-gray-700">
                <li>Terhubung dengan talenta lokal di sekitar Anda</li>
                <li>Semua penyedia layanan terverifikasi</li>
                <li>Platform yang aman dan terpercaya</li>
                <li>Mudah digunakan untuk semua kalangan</li>
                <li>Membantu mengembangkan ekonomi lokal</li>
            </ul>

            {{-- Call to Action --}}
            <div class="mt-8 text-center">
                <a href="{{ route('explore.index') }}" 
                   class="inline-block bg-[#3B82F6] text-white px-6 py-3 rounded-xl shadow hover:bg-[#2563EB] transition-colors">
                   Jelajahi Skill Providers
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
