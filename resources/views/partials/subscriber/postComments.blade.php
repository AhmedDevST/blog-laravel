<!-- Comment Section -->
<div class="container my-5">
    <h3 class="mb-4">Comments</h3>

    <!-- Comment List -->
    <div class="list-group mb-4">
        @forelse ($post->comments as $comment)
            <div class="list-group-item border-0 pb-3 mb-3" style="border-bottom: 1px solid #dee2e6;">
                <div class="d-flex align-items-start">
                    <img src="{{ asset('storage/' . $comment->user->image) }}" class="rounded-circle mr-3" alt="User Image"
                        style="width: 50px; height: 50px;">
                    <div class="flex-grow-1">
                        <h5 class="mb-1">{{ $comment->user->name }}</h5>
                        <p class="mb-1">{{ $comment->description_comment }}</p>
                        <small class="text-muted">
                            {{ $comment->created_at->format('M d, Y \a\t h:i A') }}
                        </small>
                    </div>
                    <div>
                        @can('delete', $comment)
                            <form action="{{ route('posts.comments.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this comment?')"
                                    class="btn btn-link text-secondary" style="font-size: 1.2rem;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                </button>
                            </form>
                        @endcan
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
        <form method="POST" id="commentForm" action="{{ route('posts.comments.store', $post->id) }}">
            @csrf
            <div class="form-group">
                <textarea name="description_comment" required class="form-control" style="background-color: #f0f0f0" id="commentText"
                    rows="3" placeholder="Your Comment" {{ old('description_comment') }}></textarea>
            </div>
            @auth
                <button type="submit" class="btn btn-custom" id="commentButton">Comment</button>
            @endauth
        </form>
    </div>
</div>

<!--  Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Log in to continue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('storage/images/blog.png') }}" alt="Join Us" class="img-fluid mb-3"
                    style="max-width: 150px;">
                <p>Join us and be a part of our community. Log in to leave your comments and interact with other
                    members.</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('login') }}" class="btn btn-custom w-100 mb-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-create-account w-100">Create Account</a>
            </div>
        </div>
    </div>
</div>

<!-- JS Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var commentForm = document.getElementById('commentForm');
        var commentText = document.getElementById('commentText');
        commentForm.addEventListener('submit', function(event) {
            @if (!auth()->check())
                event.preventDefault(); // Prevent form submission
                $('#loginModal').modal('show'); // Show the login modal
            @endif
        });
        commentText.addEventListener('click', function() {
            @if (!auth()->check())
                $('#loginModal').modal('show'); // Show the login modal
            @endif
        });
    });
</script>
