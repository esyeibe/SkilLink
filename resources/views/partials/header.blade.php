<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
        {{-- Logo --}}
        <a href="{{ url('/') }}" class="text-xl font-bold text-gray-900">Skillink</a>

        {{-- Menu --}}
        <nav class="flex items-center space-x-6">
            <a href="{{ url('/') }}" class="text-gray-700 hover:text-gray-900">Home</a>
            <a href="{{ route('explore.index') }}" class="text-gray-700 hover:text-gray-900">Explore Skill</a>
            <a href="{{ url('/about') }}" class="text-gray-700 hover:text-gray-900">About</a>

            {{-- Admin Dashboard --}}
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-gray-900">Dashboard</a>
                @endif
            @endauth
        </nav>

        {{-- User Menu --}}
        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Login</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Register</a>
            @else
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 px-4 py-2 bg-gray-100 rounded hover:bg-gray-200">
                        <span>{{ auth()->user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg py-2">
                        {{-- <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a> --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</header>
