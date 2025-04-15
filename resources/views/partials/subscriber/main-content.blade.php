<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-wrap -mx-4">
        <!-- Posts Section -->
        <div class="w-full lg:w-2/3 px-4">
            @forelse ($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4" role="alert">
                    No posts available
                </div>
            @endforelse

            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>

        <!-- Sidebar Section -->
        <div class="w-full lg:w-1/3 px-4 mt-8 lg:mt-0">
            @include('partials.subscriber.sidebar', [
                'editors' => $editors,
                'categories' => $categories,
                'tags' => $tags,
                'recentPosts'=>$recentPosts
            ])
        </div>
    </div>
</div>
