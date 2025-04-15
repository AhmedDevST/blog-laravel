<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-60 object-cover" alt="Post Image">
    <div class="p-5">
        <div class="flex justify-between items-center mb-3">
            <a href="{{ route('home.posts.show', $post->id) }}" class="text-indigo-700 hover:text-indigo-900 transition">
                <h5 class="text-xl font-semibold">{{ $post->title }}</h5>
            </a>
            <span class="text-gray-500 text-sm">{{ $post->category->name ?? 'No Category' }}</span>
        </div>
        <p class="text-gray-600 mb-4">{{ $post->description }}</p>
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 text-sm text-gray-500 space-y-2 sm:space-y-0">
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                {{ $post->user->name }}
            </span>
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ $post->created_at->format('d M Y') }}
            </span>
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $post->created_at->diffForHumans() }}
            </span>
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                {{ $post->comments_count }}
            </span>
        </div>
        <div class="flex justify-end mb-4">
            <div class="flex flex-wrap gap-2">
                @foreach ($post->tags as $tag)
                    <x-tag :tag="$tag" />
                @endforeach
            </div>
        </div>
        <a href="{{ route('home.posts.show', $post->id) }}" class="inline-block px-4 py-2 border border-indigo-600 text-indigo-600 font-medium rounded-lg hover:bg-indigo-50 transition duration-300">Read More</a>
    </div>
</div>
