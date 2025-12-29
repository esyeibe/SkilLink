{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#3B82F6]/10 via-white to-[#10B981]/10 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        {{-- Logo & Judul --}}
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-br from-[#3B82F6] to-[#10B981] rounded-2xl flex items-center justify-center mx-auto mb-4">
                <span class="text-white text-2xl font-bold">S</span>
            </div>
            <h2 class="text-gray-900 text-xl font-semibold">Bergabung dengan Skillink</h2>
            <p class="text-gray-600 mt-2">Buat akun baru untuk memulai</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-200 p-8">
            {{-- Error Validation --}}
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-red-600 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5" id="register-form">
                @csrf

                {{-- Hidden field untuk role --}}
                <input type="hidden" name="role" id="role" value="user">

                {{-- Name --}}
                <div>
                    <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" placeholder="Masukkan nama lengkap"
                        value="{{ old('name') }}"
                        class="w-full pl-4 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                        required>
                </div>

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

                {{-- Confirm Password --}}
                <div>
                    <label class="block text-gray-700 mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi password"
                        class="w-full pl-4 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#3B82F6] focus:border-transparent"
                        required>
                </div>

                {{-- Submit --}}
                <button type="submit" class="w-full bg-[#3B82F6] text-white py-3 rounded-xl hover:bg-[#2563EB] transition-colors text-center">
                    Daftar
                </button>
            </form>

            {{-- Toggle ke Login --}}
            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-[#3B82F6] hover:text-[#2563EB] transition-colors">Masuk di sini</a>
                </p>
            </div>
        </div>

        {{-- Kembali ke Home --}}
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#3B82F6] transition-colors text-left">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

{{-- Script Toggle Role --}}
<script>
    const btnUser = document.getElementById('btn-user');
    const btnProvider = document.getElementById('btn-provider');
    const roleInput = document.getElementById('role');

    btnUser.addEventListener('click', () => {
        roleInput.value = 'user';
        btnUser.classList.add('border-[#3B82F6]', 'bg-[#3B82F6]/10', 'text-[#3B82F6]');
        btnProvider.classList.remove('border-[#3B82F6]', 'bg-[#3B82F6]/10', 'text-[#3B82F6]');
        btnProvider.classList.add('border-gray-200', 'text-gray-600');
    });

    btnProvider.addEventListener('click', () => {
        roleInput.value = 'provider';
        btnProvider.classList.add('border-[#3B82F6]', 'bg-[#3B82F6]/10', 'text-[#3B82F6]');
        btnUser.classList.remove('border-[#3B82F6]', 'bg-[#3B82F6]/10', 'text-[#3B82F6]');
        btnUser.classList.add('border-gray-200', 'text-gray-600');
    });
</script>
@endsection

