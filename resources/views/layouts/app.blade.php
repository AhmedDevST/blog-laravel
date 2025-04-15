<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    </head>

<body class="bg-gray-100 font-sans antialiased">
    <nav class="bg-white shadow-md py-3">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <a class="text-xl font-semibold text-gray-800" href="#">Blog</a>
            <div class="flex-grow justify-center">
                <form class="flex w-1/2 mx-auto" method="GET" action="{{ route('posts.search') }}">
                    @csrf
                    <input name="paramSearch" type="text" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent mb-3" placeholder="Search...">   </form>
            </div>
            <ul class="flex items-center space-x-4">
                <li>
                    <a class="text-gray-700 hover:text-gray-900" href="{{ route('posts.index') }}">All Posts</a>
                </li>
                @auth
                <li>
                    <div class="relative">
                        <button id="dropdownMenuButton" data-dropdown-toggle="dropdown" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            {{auth()->user()->name}}
                            <svg class="w-4 h-4 inline-block ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div id="dropdown" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        @csrf
                                        <button type="submit" class="w-full text-left">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                @endauth
                @guest
                <li>
                    <a class="text-gray-700 hover:text-gray-900" href="{{ route('login.show') }}">Login</a>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="container mx-auto mt-8 px-4">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UfY7mJpHNWgxYvEx1stSUzfBAF5bbSmZXwdCAXrjLQzlAAzCMYkgYBJiD8j/6vEJ+HVUsF0LL5MaMD+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-rC3L11bgpflcv7YXRjqkKt9uqYZomzIbmbRknvMaUYSdYyZ352mOLvHO7zihnidENpTzZswpLlcrnDEWKo0t6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dropdownButton = document.getElementById('dropdownMenuButton');
            const dropdownDiv = document.getElementById('dropdown');

            if (dropdownButton && dropdownDiv) {
                dropdownButton.addEventListener('click', () => {
                    dropdownDiv.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', (event) => {
                    if (!dropdownDiv.contains(event.target) && !dropdownButton.contains(event.target)) {
                        dropdownDiv.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>

</html>
