{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('content')
@php
    $isLogin = request()->routeIs('login'); // jika route login, maka login; else register
@endphp

<div class="min-h-screen bg-gradient-to-br from-[#3B82F6]/10 via-white to-[#10B981]/10 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        {{-- Logo & Judul --}}
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-br from-[#3B82F6] to-[#10B981] rounded-2xl flex items-center justify-center mx-auto mb-4">
                <span class="text-white text-2xl font-bold">S</span>
            </div>
            <h2 class="text-gray-900 text-xl font-semibold">
                {{ $isLogin ? 'Selamat Datang Kembali' : 'Bergabung dengan Skillink' }}
            </h2>
            <p class="text-gray-600 mt-2">
                {{ $isLogin ? 'Masuk ke akun Anda untuk melanjutkan' : 'Buat akun baru untuk memulai' }}
            </p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200 p-8">
            {{-- Tampilkan error validation --}}
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-red-600 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ $isLogin ? route('login') : route('register') }}" class="space-y-5">
                @csrf

                {{-- Name field hanya untuk register --}}
                @unless($isLogin)
                    <div>
                        <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="name" placeholder="Masukkan nama lengkap"
                            value="{{ old('name') }}"
                            class="w-full pl-4 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                            required>
                    </div>
                @endunless

                {{-- Email --}}
                <div>
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" placeholder="nama@email.com"
                        value="{{ old('email') }}"
                        class="w-full pl-4 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                        required>
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" placeholder="Masukkan password"
                        class="w-full pl-4 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                        required>
                </div>

                {{-- Confirm Password hanya untuk register --}}
                @unless($isLogin)
                    <div>
                        <label class="block text-gray-700 mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi password"
                            class="w-full pl-4 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                            required>
                    </div>
                @endunless

                {{-- Forgot Password (login only) --}}
                @if($isLogin)
                    <div class="text-right">
                        <a href="{{ route('password.request') }}" class="text-[#3B82F6] hover:text-[#2563EB] transition-colors text-sm">
                            Lupa Password?
                        </a>
                    </div>
                @endif

                {{-- Submit --}}
                <button type="submit" class="w-full bg-[#3B82F6] text-white py-3 rounded-xl hover:bg-[#2563EB] transition-colors text-center">
                    {{ $isLogin ? 'Masuk' : 'Daftar' }}
                </button>
            </form>

            {{-- Toggle Login/Register --}}
            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                    {{ $isLogin ? 'Belum punya akun?' : 'Sudah punya akun?' }}
                    <a href="{{ $isLogin ? route('register') : route('login') }}" class="text-[#3B82F6] hover:text-[#2563EB] transition-colors">
                        {{ $isLogin ? 'Daftar sekarang' : 'Masuk di sini' }}
                    </a>
                </p>
            </div>
        </div>

        {{-- Kembali ke home --}}
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#3B82F6] transition-colors text-left">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection

