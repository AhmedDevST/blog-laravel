<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <div class="p-5">
        <h5 class="text-lg font-semibold mb-4">Authors</h5>
        @foreach ($editors as $editor)
        <div class="bg-white rounded-md overflow-hidden mb-3">
            <div class="flex flex-row">
                <!-- Author Image -->
                <div class="w-1/4">
                    <img src="{{ asset('storage/' . $editor->image) }}" class="h-full w-full object-cover rounded-l-md" alt="{{ $editor->name }}">
                </div>
                <!-- Author Details -->
                <div class="w-3/4">
                    <div class="p-2">
                        <h6 class="font-medium text-gray-800">{{$editor->name}}</h6>
                        <p class="text-sm text-gray-600 truncate">{{$editor->email}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-b border-gray-200 my-2"></div>
        @endforeach
    </div>
</div>
