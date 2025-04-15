@extends('layouts.app')
@section('title')
    {{ $post->title }}
@endsection
@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('posts.index') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-900">
            <svg class="mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Posts
        </a>
    </div>

    <!-- Post Info Card -->
    <div class="bg-white overflow-hidden shadow rounded-lg mb-8">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-2xl font-bold text-gray-900">{{ $post->title }}</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Posted on {{ $post->created_at->format('F d, Y') }}
            </p>
        </div>
        <div class="border-t border-gray-200">
            <div class="px-4 py-5 sm:p-6 flex flex-col md:flex-row md:justify-between md:items-start gap-6">
                <div class="flex-1">
                    <div class="mb-4">
                        <h4 class="text-lg font-medium text-gray-900">Description</h4>
                        <p class="mt-2 text-gray-600">{{ $post->description }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="text-lg font-medium text-gray-900">Category</h4>
                        <p class="mt-2 inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                            {{ $post->category->name ?? 'No Category' }}
                        </p>
                    </div>

                    <div>
                        <h4 class="text-lg font-medium text-gray-900">Tags</h4>
                        <div class="mt-2 flex flex-wrap gap-2">
                            @forelse($post->tags as $tag)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $tag->name }}
                                </span>
                            @empty
                                <span class="text-sm text-gray-500">No tags</span>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/3">
                    <img class="w-full h-auto object-cover rounded-lg shadow-sm"
                        src="{{ asset('storage/' . $post->image) }}"
                        alt="{{ $post->title }}">
                </div>
            </div>
        </div>
    </div>

    <!-- Author Info Card -->
    <div class="bg-white overflow-hidden shadow rounded-lg mb-8">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium text-gray-900">About the Author</h3>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-12 w-12 bg-gray-200 rounded-full flex items-center justify-center">
                    <svg class="h-8 w-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="text-lg font-bold text-gray-900">{{ $post->user->name }}</h4>
                    <p class="text-sm text-gray-500">{{ $post->user->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium text-gray-900">Comments</h3>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
            <!-- Add Comment Form -->
            <div class="mb-8">
                <h4 class="text-lg font-medium text-gray-900 mb-4">Leave a Comment</h4>

                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Please fix the following errors:</h3>
                                <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('posts.comments.store', $post->id) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="commentTextarea" class="block text-sm font-medium text-gray-700 mb-1">Your comment</label>
                        <textarea name="description_comment" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="commentTextarea" rows="3" placeholder="Write your comment...">{{ old('description_comment') }}</textarea>
                    </div>
                    <div>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>

            <!-- Comments List -->
            <div>
                <h4 class="text-lg font-medium text-gray-900 mb-4">All Comments ({{ $post->comments->count() }})</h4>

                <div class="space-y-4">
                    @forelse ($post->comments as $comment)
                        <div class="bg-gray-50 rounded-lg p-4 shadow-sm">
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="flex items-center">
                                        <div class="font-medium text-gray-900">{{ $comment->user->name }}</div>
                                        <div class="ml-2 text-xs text-gray-500">{{ $comment->created_at->format('M d, Y') }}</div>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-600">
                                        {{ $comment->description_comment }}
                                    </div>
                                </div>

                                @can('delete', $comment)
                                    <form action="{{ route('posts.comments.destroy', $comment->id) }}" method="POST" class="flex-shrink-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this comment?')"
                                            class="text-red-600 hover:text-red-900">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4 text-gray-500">
                            <p>No comments yet. Be the first to comment!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
