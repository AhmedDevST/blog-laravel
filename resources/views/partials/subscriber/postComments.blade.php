<!-- Comment Section -->
<div class="container my-5">
    <h3 class="mb-4">Comments</h3>
    
    <!-- Comment List -->
    <div class="list-group mb-4">
        @forelse ($post->comments as $comment)
            <div class="list-group-item border-0 pb-3 mb-3" style="border-bottom: 1px solid #dee2e6;">
                <div class="d-flex align-items-start">
                    <img src="{{ asset('storage/' . $comment->user->image) }}" class="rounded-circle mr-3" alt="User Image" style="width: 50px; height: 50px;">
                    <div>
                        <h5 class="mb-1">{{ $comment->user->name }}</h5>
                        <p class="mb-1">{{ $comment->description_comment }}</p>
                        <small class="text-muted">
                            {{ $comment->created_at->format('M d, Y \a\t h:i A') }}
                        </small>                        
                    </div>
                </div>
            </div>
        @empty
            <div class="list-group-item border-0">
                <p class="mb-0">No comments yet.</p>
            </div>
        @endforelse
    </div>
    
    <!-- Leave a Comment -->
    <div>
        <h4 class="mb-3">Leave a Comment</h4>
        <form>
            <div class="form-group">
                <textarea required class="form-control" style="background-color: #f0f0f0" id="commentText" rows="3" placeholder="Your Comment"></textarea>   
            </div>
            <button type="submit" class="btn btn-custom">Comment </button>
        </form>
    </div>
</div>
