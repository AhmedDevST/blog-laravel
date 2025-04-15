<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <div class="p-5">
        <h5 class="text-lg font-semibold mb-4">Search</h5>
        <form method="GET" action="{{ route('home.search') }}">
            <div class="relative">
                <input name="query" type="text" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent mb-3" placeholder="Search...">
                <button type="submit" class="w-full px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-lg shadow-md hover:from-indigo-500 hover:to-purple-500 transition duration-300">Search</button>
            </div>
        </form>
    </div>
</div>
