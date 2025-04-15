<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <div class="p-5">
        <h5 class="text-lg font-semibold mb-4">Categories</h5>

        @foreach ($categories as $category)
        <div class="flex justify-between items-center mb-2">
            <h6 class="font-medium text-gray-800 m-0">{{$category->name}}</h6>
            <span class="bg-gray-800 text-white text-xs px-2 py-1 rounded-full">{{$category->posts_count}}</span>
        </div>
        <div class="border-b border-gray-200 my-2"></div>
        @endforeach
    </div>
</div>
