@extends('layouts.subscriber')
@section('title', 'index')
@section('content')
    <div class="row">
        @include('partials.subscriber.main-content', [
            'posts' => $posts,
            'editors' => $editors,
            'categories' => $categories,
            'tags' => $tags,
            'recentPosts' =>$recentPosts
        ])
    </div>
@endsection
