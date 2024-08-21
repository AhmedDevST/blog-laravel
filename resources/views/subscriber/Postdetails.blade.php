@extends('layouts.subscriber')
@section('title', 'details')
@section('content')
    <div class="container my-5">
        @include('partials.subscriber.post_meta', ['post' => $post])
        <hr style="border-top: 1px solid #D3D3D3; margin-top: 6px; margin-bottom: 6px;">
        @include('partials.subscriber.postComments', ['post' => $post])
    </div>
@endsection
