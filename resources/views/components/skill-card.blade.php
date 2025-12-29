<div class="bg-white rounded-xl shadow p-4 cursor-pointer hover:shadow-md transition">
    <h3 class="text-gray-900 font-semibold">{{ $skill->name }}</h3>
    <p class="text-gray-600">{{ $skill->skill_title }}</p>
    <p class="text-gray-500 text-sm">Rating: {{ $skill->rating }} ({{ $skill->total_reviews }} ulasan)</p>
</div>
