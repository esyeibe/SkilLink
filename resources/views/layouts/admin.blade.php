<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Skillink</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex">
    {{-- Sidebar --}}
    <aside class="w-64 bg-white shadow-md">
        <div class="p-4 font-bold text-xl">SKILLINK Admin</div>
        <nav class="mt-4">
            <ul class="space-y-1">
                <li><a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-200">Dashboard</a></li>
                <li><a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 hover:bg-gray-200">Categories</a></li>
                <li><a href="{{ route('admin.providers.index') }}" class="block px-4 py-2 hover:bg-gray-200">Skill Providers</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-red-600 hover:bg-gray-200">Logout</a></li>
            </ul>
        </nav>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1">
        <div class="bg-white shadow px-6 py-3">
            <h1 class="text-lg font-semibold">@yield('title')</h1>
        </div>
        <div class="p-6">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
