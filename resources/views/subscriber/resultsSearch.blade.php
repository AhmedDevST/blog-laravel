@extends('layouts.subscriber')
@section('title', 'Results search')
@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    @if (request()->has('query'))
        <!-- Display search query -->
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 text-center">Search Results for "{{ request('query') }}"</h2>
    @endif

    <div class="flex flex-col items-center">
        @forelse ($posts as $post)
            <!-- Post Card -->
            <div class="w-full max-w-3xl mb-6">
                <div class="h-full bg-white rounded-lg shadow-md overflow-hidden">
                    <x-post-card :post="$post" />
                </div>
            </div>
        @empty
            <div class="w-full max-w-3xl">
                <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm">No posts available</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="col-12 text-center mt-4">
        {{ $posts->appends(['query' => request('query')])->links('pagination::tailwind') }}
    </div>
</div>
@endsection


