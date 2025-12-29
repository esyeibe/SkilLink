@extends('layouts.admin')

@section('title', 'Add Skill Provider')

@section('content')

<div class="max-w-lg mx-auto bg-white/60 backdrop-blur-sm rounded-2xl border border-gray-200 p-6 shadow-lg">
    <h2 class="text-lg font-semibold mb-6">Add New Provider</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.providers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-medium mb-1">Name</label>
            <input type="text" name="name" id="name" 
                   class="w-full border border-gray-300 px-3 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label for="skill_title" class="block font-medium mb-1">Skill Title</label>
            <input type="text" name="skill_title" id="skill_title" 
                   class="w-full border border-gray-300 px-3 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   value="{{ old('skill_title') }}" required>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block font-medium mb-1">Category</label>
            <select name="category_id" id="category_id" 
                    class="w-full border border-gray-300 px-3 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="location" class="block font-medium mb-1">Location</label>
            <input type="text" name="location" id="location" 
                   class="w-full border border-gray-300 px-3 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   value="{{ old('location') }}">
        </div>

        <div class="mb-4">
            <label for="image" class="block font-medium mb-1">Image</label>
            <input type="file" name="image" id="image" 
                   class="w-full border border-gray-300 px-3 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-6 flex items-center">
            <input type="checkbox" name="verified" id="verified" value="1" {{ old('verified') ? 'checked' : '' }} 
                   class="mr-2 w-4 h-4 rounded border-gray-300">
            <label for="verified" class="text-gray-700 font-medium">Verified</label>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.providers.index') }}" 
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
