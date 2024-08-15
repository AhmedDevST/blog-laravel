@extends('layoutes.app')
@section('title', 'edit')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        <!-- Input Field -->
        <div class="mb-3">
            <label for="inputField" class="form-label">Enter Title</label>
            <input type="text" value="{{ $post->title }}" name="title" class="form-control" id="inputField"
                placeholder="enter Title">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Add a brief description">{{ $post->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="authorSelect" class="form-label">Post creator</label>
            <select class="form-select" id="authorSelect" name="created_by">
                @forelse ($creators as $creator)
                    <option @selected($creator->id == $post->user->id) value="{{ $creator->id }}">{{ $creator->name }}</option>
                @empty
                    <option value="-1">No creators</option>
                @endforelse
            </select>
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
