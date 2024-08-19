@extends('layoutes.app')
@section('title')
    show
@endsection
@section('content')
    <!-- Main Content -->

    <div class="row">
        <!-- Card Container Column -->
        <div class="col-md-12">
            <!-- Card 1: Info Post -->
            <div class="card mb-4">
                <div class="card-header">
                    Info Post
                </div>
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Title: {{ $post->title }}</h5>
                        <p class="card-text">Description: {{ $post->description }}.</p>
                        <p class="card-text"><small class="text-muted">Posted at: {{ $post['created_at'] }}</small></p>
                    </div>
                    <div>
                        <img class="img-fluid" style="border-radius: 8px; width: 250px; height: 200px;"
                            src="{{ asset('storage/' . $post->image) }}" alt="Image">
                    </div>
                </div>
            </div>


            <!-- Card 2: About Author -->
            <div class="card">
                <div class="card-header">
                    About the posted
                </div>
                <div class="card-body">
                    <h5 class="card-title">Name:{{ $post->user->name }}</h5>
                    <p class="card-text"><small class="text-muted">email : {{ $post->user->email }} </small></p>
                </div>
            </div>
            <!-- Comment Section -->

            <div class="card mt-4">
                <div class="card-header">
                    Comments
                </div>
                <div class="card-body">
                    <!-- Comment Form -->
                    <h5 class="card-title">Leave a Comment</h5>
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('posts.comments.store', $post->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="authorSelect" class="form-label">user</label>
                            <select class="form-select" id="authorSelect" name="user_comment">
                                @forelse ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @empty
                                    <option value="-1">No users</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="commentTextarea">Comment</label>
                            <textarea name="description_comment" class="form-control" id="commentTextarea" rows="3"
                                placeholder="Your comment">{{ old('description_comment') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <!-- Comments Container -->
                <div class="card-body">
                    <h5 class="card-title">All Comments</h5>
                    <div id="comments-container">
                        @forelse ($post->comments  as $comment)
                            <div class="media mb-4 border rounded p-3">
                                <div class="media-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mt-0">
                                            {{ $comment->user->name }}
                                            <small style="margin-left: 10px;" class="text-muted">
                                                {{ $comment->created_at->format('M-d') }}
                                            </small>
                                        </h5>
                                        {{ $comment->description_comment }}
                                    </div>
                                    @can('delete', $comment)
                                        <form action="{{ route('posts.comments.destroy', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this comment?')"
                                                class="btn btn-link text-danger">
                                                <i class="fas fa-trash text-danger fa-lg"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </div>

                        @empty
                            <h4 class="text-center">no comments yet</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
