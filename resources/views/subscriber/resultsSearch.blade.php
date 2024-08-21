@extends('layouts.subscriber')
@section('title', 'Results search')
@section('content')
<div class="container mt-5">
    @if (request()->has('query'))
        <!-- Display search query -->
        <h2 class="mb-4">Search Results for "{{ request('query') }}"</h2>
    @endif

    <div class="row justify-content-center">
        @forelse ($posts as $post)
            <!-- Post Card -->
            <div class="col-md-8 mb-4">
                <div class="card d-flex flex-column h-100">
                    <x-post-card :post="$post" />
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <div class="alert alert-primary" role="alert">
                    No posts available
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="row">
        <div class="col-12 text-center mt-4">
            {{ $posts->appends(['query' => request('query')])->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
