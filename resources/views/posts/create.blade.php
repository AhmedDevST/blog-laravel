@extends('layoutes.app')
@section('title', 'create')
@section('content')
    @if ($errors->any())
        <x-alert :errors="$errors" />
    @endif
    <form method="POST"  enctype="multipart/form-data" action="{{ route('posts.store') }}">
        @csrf
        <!-- Input Field -->
        <div class="mb-3">
            <label for="inputField" class="form-label">Enter Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="inputField"
                placeholder="enter Title">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" placeholder="Add a brief description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="authorSelect" class="form-label">Post creator</label>
            <select class="form-select" id="authorSelect" name="created_by">
                @forelse ($creators as $creator)
                    <option value="{{ $creator->id }}">{{ $creator->name }}</option>
                @empty
                    <option value="-1">No creators</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label for="image">Choose Image:</label>
            <input type="file" name="image" {{old('image')}} class="form-control" id="image" >
        </div>
        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
