@extends('layouts.admin')

@section('title', 'Manage Skill Providers')

@section('content')

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">Skill Providers</h2>
    <a href="{{ route('admin.providers.create') }}" 
       class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600 transition-colors">
       Add Provider
    </a>
</div>

<div class="bg-white/60 backdrop-blur-sm rounded-2xl border border-gray-200 shadow overflow-x-auto">
    <table class="w-full table-auto min-w-[600px]">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">ID</th>
                <th class="border px-4 py-2 text-left">Name</th>
                <th class="border px-4 py-2 text-left">Skill Title</th>
                <th class="border px-4 py-2 text-left">Category</th>
                <th class="border px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($providers as $provider)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="border px-4 py-2">{{ $provider->id }}</td>
                    <td class="border px-4 py-2">{{ $provider->name }}</td>
                    <td class="border px-4 py-2">{{ $provider->skill_title }}</td>
                    <td class="border px-4 py-2">{{ $provider->category->name ?? '-' }}</td>
                    <td class="border px-4 py-2 flex gap-2">
                        <a href="{{ route('admin.providers.edit', $provider) }}" 
                           class="bg-yellow-400 text-white px-3 py-1 rounded-xl hover:bg-yellow-500 transition-colors">Edit</a>

                        <form action="{{ route('admin.providers.destroy', $provider) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 text-white px-3 py-1 rounded-xl hover:bg-red-600 transition-colors"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border px-4 py-4 text-center text-gray-500">
                        No providers found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $providers->links() }}
</div>

@endsection
