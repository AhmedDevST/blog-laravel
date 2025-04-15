<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <div class="p-5">
        <h5 class="text-lg font-semibold mb-2">Tags</h5>
        <p class="text-gray-600 mb-4">This is a brief description of the blog post content. It gives an overview of what the post is about.</p>
        <div class="flex flex-wrap gap-2">
            @foreach ($tags as $tag)
                <x-tag :tag="$tag" />
            @endforeach
        </div>
    </div>
</div>
