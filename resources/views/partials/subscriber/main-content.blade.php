<div class="container">
    <div class="row">
        <!-- Posts Section -->
        <div class="col-md-8">
            @if (request()->has('query'))
                <!-- Display search query -->
                <h2>Search Results for "{{ request('query') }}"</h2>
            @endif
            @forelse ($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <div class="alert alert-primary" role="alert">
                    No posts available
                </div>
            @endforelse
            {{ $posts->appends(['query' => $query])->links('pagination::bootstrap-4') }}
        </div>
        <!-- Sidebar Section -->
        <div class="col-md-4">
            @include('partials.subscriber.sidebar', [
                'editors' => $editors,
                'categories' => $categories,
                'tags' => $tags,
            ])
        </div>
    </div>
</div>
