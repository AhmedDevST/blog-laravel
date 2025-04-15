<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <div class="p-5">
        <h5 class="text-lg font-semibold mb-4">Recent Posts</h5>
        @forelse ($recentPosts as $post)
            <div class="mb-3">
                <div class="flex flex-row">
                    <!-- Post Image -->
                    <div class="w-1/4 flex items-center">
                        <img src="{{ asset('storage/' . $post->image) }}" class="h-16 w-full object-cover rounded-md" alt="Post Image">
                    </div>

                    <!-- Post Details -->
                    <div class="w-3/4">
                        <div class="p-2">
                            <a href="{{ route('home.posts.show', $post->id) }}" class="text-indigo-700 hover:text-indigo-900 transition">
                                <h6 class="font-medium text-gray-800 text-sm">{{ $post->title }}</h6>
                            </a>
                            <div class="flex items-center mt-1">
                                <span class="text-xs text-gray-500 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $post->created_at->format('d M, Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-b border-gray-200 my-2"></div>
            </div>
        @empty
            <div class="py-2">
                <p class="text-gray-500">No recent posts.</p>
            </div>
        @endforelse
    </div>
</div>

