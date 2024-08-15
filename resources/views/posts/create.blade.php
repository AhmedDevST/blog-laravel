@extends('layoutes.app')
@section('title', 'create')
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
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <!-- Input Field -->
        <div class="mb-3">
            <label for="inputField" class="form-label">Enter Title</label>
            <input type="text" name="title" value="{{old('title')}}" class="form-control" id="inputField" placeholder="enter Title">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description"    class="form-control" id="description" rows="3" placeholder="Add a brief description">{{old('description')}}</textarea>
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
        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
