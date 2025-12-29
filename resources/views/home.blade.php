@extends('layouts.app')

@section('content')
<div class="flex flex-col min-h-screen">

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-[#3B82F6]/10 via-white to-[#10B981]/10 py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4">
                    Hubungkan Keahlian, Dekatkan Peluang
                </h1>
                <p class="text-gray-600 mb-8">
                    Temukan atau tawarkan keahlian lokal dengan mudah. Skillink menghubungkan Anda dengan talenta terbaik di sekitar Anda.
                </p>

                <!-- Search Bar -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-4 shadow-lg border border-gray-200">
                    <form action="{{ route('explore.index') }}" method="GET" class="flex flex-col md:flex-row gap-3">
                        <input type="text" name="q" placeholder="Cari skill atau layanan..."
                               class="flex-1 pl-4 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent">
                        <input type="text" name="location" placeholder="Lokasi"
                               class="md:w-64 pl-4 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent">
                        <button type="submit" class="bg-[#3B82F6] text-white px-8 py-3 rounded-xl hover:bg-[#2563EB] transition-colors">
                            Cari
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <div class="w-14 h-14 bg-[#3B82F6]/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#3B82F6]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2h5m7-10a4 4 0 11-8 0 4 4 0 018 0z" />
								</svg>
							</div>

                    <h3 class="text-gray-900 mb-2">Terhubung Lokal</h3>
                    <p class="text-gray-600">Temukan talenta dan layanan terbaik di sekitar area Anda</p>
                </div>

                <div class="text-center p-6">
                    <div class="w-14 h-14 bg-[#10B981]/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#10B981]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l9-5-9-5-9 5 9 5zm0 0v8l-9 5 9-5 9 5-9-5v-8z"/>
									</svg>
                    </div>
                    <h3 class="text-gray-900 mb-2">Terverifikasi</h3>
                    <p class="text-gray-600">Semua penyedia layanan diverifikasi untuk keamanan Anda</p>
                </div>

                <div class="text-center p-6">
                    <div class="w-14 h-14 bg-[#3B82F6]/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#3B82F6]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 17l6-6 4 4 8-8" />
								</svg>
                    </div>
                    <h3 class="text-gray-900 mb-2">Berkembang Bersama</h3>
                    <p class="text-gray-600">Kembangkan karir dan bisnis Anda dengan klien baru</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Skills Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-gray-900 mb-4 text-3xl font-semibold">Skill Unggulan di Sekitar Anda</h2>
                <p class="text-gray-600">Temukan berbagai layanan dan keahlian dari para profesional terverifikasi</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($featuredSkills as $skill)
                    <div class="bg-white shadow rounded-xl p-6 cursor-pointer hover:shadow-lg transition"
                         onclick="window.location='{{ route('provider.show', $skill->id) }}'">
                        <img src="{{ asset('storage/' . $skill->image_url) }}" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-gray-900 text-lg font-semibold mb-1">{{ $skill->name }}</h3>
                        <p class="text-gray-600">{{ $skill->skill_title }}</p>
                        <p class="text-gray-500 text-sm mt-2">Rating: {{ $skill->rating }}/5</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                <a href="{{ route('explore.index') }}" class="bg-white border-2 border-[#3B82F6] text-[#3B82F6] px-8 py-3 rounded-full hover:bg-[#3B82F6] hover:text-white transition-colors">
                    Lihat Semua Skill
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-br from-[#3B82F6] to-[#10B981] text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="mb-4 text-3xl font-semibold">Siap Berbagi Keahlian Anda?</h2>
            <p class="mb-8 opacity-90">
                Bergabunglah dengan ribuan profesional yang telah meningkatkan bisnis mereka dengan Skillink
            </p>
            <a href="{{ route('register') }}" class="bg-white text-[#3B82F6] px-8 py-3 rounded-full hover:bg-gray-100 transition-colors">
                Daftar Sebagai Penyedia Layanan
            </a>
        </div>
    </section>

</div>
@endsection
