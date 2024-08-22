@extends('layouts.app')
@section('title', 'edit')
@section('content')
    @if ($errors->any())
        <x-alert :errors="$errors" />
    @endif
    <form method="POST" enctype="multipart/form-data" action="{{ route('posts.update', $post->id) }}">
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
            <label for="creator" class="form-label">Creator</label>
            <input type="text" value="{{ $post->user->name }}" name="creator" class="form-control" id="inputField"
                disabled />
        </div>
        <!-- category -->
        <div class="mb-3">
            <label for="exampleSelect">Select a category</label>
            <select class="form-control" id="exampleSelect" name="category">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option @selected($post->category->id == $category->id) value={{ $category->id }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- tags -->
        <div class="mb-4">
            <label for="tags">Select Tags</label>
            <div id="tags" class="d-flex flex-wrap">
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                            id="tag-{{ $tag->id }}" @checked(in_array($tag->id, $post->tags->pluck('id')->toArray()))>
                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
            </div>

        </div>

        <div class="form-group mb-3">
            <label for="image">Upload New Image:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
