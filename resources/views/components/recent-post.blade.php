<div class="card sidebar-card shadow-sm border-0">
    <div class="card-body">
        <h5 class="card-title">Recent Posts</h5>
        @forelse ($recentPosts as $post)
            <div class="card mb-3">
                <div class="row g-0">
                    <!-- Post Image -->
                    <div class="col-md-4 d-flex align-items-center">
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="Post Image"
                            style="height: 70%; width: 100%; object-fit: cover; margin: auto;">
                    </div>

                    <!-- Post Details -->
                    <div class="col-md-8">
                        <div class="card-body p-2"> <!-- Adjust padding -->
                            <a href="{{ route('home.posts.show', $post->id) }}" class="post-link">
                                <h6 class="card-title">{{ $post->title }}</h6>
                            </a>
                            <div class="d-flex align-items-center">
                                <span class="text-muted small">
                                    <i class="bi bi-calendar-date me-3 text-secondary fs-6"></i>   {{ $post->created_at->format('d M, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid #D3D3D3; margin-top: 5px; margin-bottom: 5px;"> <!-- Adjust margin -->
            </div>
        @empty
            <div class="list-group-item border-0">
                <p class="mb-0">No recent posts.</p>
            </div>
        @endforelse
    </div>
</div>
