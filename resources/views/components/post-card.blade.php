<div class="card post-card shadow-sm border-0 mb-4">
    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top rounded-0" alt="Post Image">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h5 class="card-title mb-0">{{ $post->title }}</h5>
            <span class="text-muted">{{ $post->category->name }}</span>
        </div>
        <p class="card-text">{{ $post->description }}.</p>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span><i class="bi bi-person me-1"></i> {{ $post->user->name }}</span>
            <span><i class="bi bi-calendar me-1"></i>{{ $post->created_at->format('d M Y') }} </span>
            <span><i class="bi bi-chat-dots me-1"></i>{{ $post->comments_count }}</span>
        </div>
        <div class="tags-container">
            @foreach ($post->tags as $tag)
                <a href="#" class="tag">{{$tag->name}}</a>
            @endforeach
        </div>
        <a href="#" class="btn btn-outline-read-more">Read More</a>

    </div>
</div>
