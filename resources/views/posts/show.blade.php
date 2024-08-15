@extends('layoutes.app')
@section('title') show @endsection
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
                    <div class="card-body">
                        <h5 class="card-title">Title: {{$post->title}}</h5>
                        <p class="card-text">description :{{$post->description}}.</p>
                        <p class="card-text"><small class="text-muted">Posted at: {{$post['created_at']}}</small></p>
                    </div>
                </div>

                <!-- Card 2: About Author -->
                <div class="card">
                    <div class="card-header">
                        About the posted
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Name:{{$post->user->name}}</h5>
                        <p class="card-text"><small class="text-muted">email : {{$post->user->email}}  </small></p>
                </div>
            </div>
        </div>
    @endsection
