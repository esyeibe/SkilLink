@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')

<div class="max-w-md mx-auto bg-white/60 backdrop-blur-sm rounded-2xl border border-gray-200 shadow-lg p-6">
    <h2 class="text-lg font-semibold mb-6">Add New Category</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-medium mb-2">Category Name</label>
            <input type="text" name="name" id="name" 
                   class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" 
                   value="{{ old('name') }}" required>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('admin.categories.index') }}" 
               class="px-4 py-2 rounded-xl bg-gray-300 hover:bg-gray-400 transition-colors">
               Cancel
            </a>
            <button type="submit" 
                    class="px-4 py-2 rounded-xl bg-blue-500 text-white hover:bg-blue-600 transition-colors">
                Save
            </button>
        </div>
    </form>
</div>

@endsection
