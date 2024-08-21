

<div class="card sidebar-card mb-3 shadow-sm border-0">
    <div class="card-body">
        <h5 class="card-title">Tags</h5>
        <p class="card-text">This is a brief description of the blog post content. It gives an overview of what the post is about.</p>
        <div class="tags-container">
            @foreach ($tags as $tag )
            <a href="#" class="tag">{{$tag->name}}</a>
            @endforeach
        </div>
    </div>
</div>
