@extends('layouts.subscriber')
@section('title', 'details')
@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-900">
                <svg class="mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Posts
            </a>
        </div>

        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6 md:p-8">
                @include('partials.subscriber.post_meta', ['post' => $post])
                <div class="border-t border-gray-200 my-6"></div>
                @include('partials.subscriber.postComments', ['post' => $post])
            </div>
        </div>
    </div>
@endsection
