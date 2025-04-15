@extends('layouts.subscriber')
@section('title', 'index')
@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-wrap -mx-4">
            @include('partials.subscriber.main-content', [
                'posts' => $posts,
                'editors' => $editors,
                'categories' => $categories,
                'tags' => $tags,
                'recentPosts' =>$recentPosts
            ])
        </div>
    </div>
@endsection
