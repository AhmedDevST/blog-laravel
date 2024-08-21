 <!-- Post Image -->
 <div class="text-center mb-4">
    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="Post Image">
</div>

<!-- Post Title and Meta -->
<div class="text-center mb-4">
    <h1 class="display-4">{{ $post->title }}</h1>
    <div class="text-muted">
       
        <span> <i class="bi bi-calendar me-1"></i>  {{ $post->created_at->format('M d, Y') }}</span> |
        <span><i class="bi bi-person me-1"></i>    {{ $post->user->name }}</span> |
        <span><i class="bi bi-clock me-1"></i> {{ $post->created_at->diffForHumans() }}</span> |
        <div class="d-inline">
            @foreach ($post->tags as $tag)
            <x-tag :tag="$tag" />
            @endforeach
        </div>
    </div>
</div>

<!-- Post Description -->
 <div class="mb-5">
    <p>{{ $post->description }}</p>
</div>