<div class="container">
    <div class="row">
        <!-- Posts Section -->
        <div class="col-md-8">
            @forelse ($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <div class="alert alert-primary" role="alert">
                    No posts available
                </div>
            @endforelse
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
        <!-- Sidebar Section -->
        <div class="col-md-4">
            @include('partials.subscriber.sidebar', [
                'editors' => $editors,
                'categories' => $categories,
                'tags' => $tags,
                'recentPosts'=>$recentPosts
            ])
        </div>
    </div>
</div>
