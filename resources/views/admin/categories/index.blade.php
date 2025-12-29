@extends('layouts.admin')

@section('title', 'Manage Categories')

@section('content')


@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

{{-- Back to Home --}}
    <div>
        <a href="{{ route('home') }}"
           class="inline-block text-gray-600 hover:text-[#3B82F6] transition-colors mb-4">
            ← Kembali ke Home
        </a>
    </div>

<div class="flex justify-between items-center mb-6">
    <h2 class="text-lg font-semibold">Categories</h2>
    <a href="{{ route('admin.categories.create') }}" 
       class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600 transition-colors">
       Add Category
    </a>
</div>

<div class="overflow-x-auto bg-white/60 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg">
    <table class="w-full table-auto border-collapse">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-3 text-left">ID</th>
                <th class="border px-4 py-3 text-left">Name</th>
                <th class="border px-4 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="border px-4 py-2">{{ $category->id }}</td>
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{ route('admin.categories.edit', $category) }}" 
                           class="bg-yellow-400 px-3 py-1 rounded-xl hover:bg-yellow-500 transition-colors">
                           Edit
                        </a>

                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 px-3 py-1 rounded-xl hover:bg-red-600 transition-colors"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="border px-4 py-4 text-center text-gray-500">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $categories->links() }}
</div>

@endsection
