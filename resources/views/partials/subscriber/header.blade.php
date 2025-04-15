<!-- resources/views/partials/subscriber/header.blade.php -->
<header class="py-3 sm:py-4 backdrop-blur-sm bg-white/80 sticky top-0 z-50 shadow-sm">
    <div class="container mx-auto px-4 sm:px-6">
        <!-- Desktop Navigation (md and up) -->
        <div class="hidden md:flex md:flex-row md:items-center md:justify-between md:gap-4">
            <!-- Logo - Desktop -->
            <div class="w-1/4 text-left">
                <a href="{{ route('home') }}" class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 transition duration-300">
                    <h1 class="text-2xl font-bold tracking-tight">Blog Title</h1>
                </a>
            </div>

            <!-- Search bar - Desktop -->
            <div class="w-1/2">
                <form class="flex justify-center" method="GET" action="{{ route('home.search') }}" role="search">
                    <div class="relative w-4/5">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input name="query" class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200" type="search" placeholder="Search for anything..." aria-label="Search">
                    </div>
                </form>
            </div>

            <!-- Auth buttons - Desktop -->
            <div class="w-1/4 text-right">
                @auth
                    <div class="relative inline-block text-left">
                        <button class="flex items-center space-x-2 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 shadow-md transition duration-300" type="button" id="dropdownMenuButton" onclick="toggleDropdown()">
                            <span>{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 z-10 ring-1 ring-black ring-opacity-5 transform transition-all duration-200">
                           <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition duration-200">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="flex flex-row gap-2">
                        <a href="{{ route('login') }}" class="bg-white border border-gray-200 text-gray-800 hover:bg-gray-50 font-medium py-2 px-4 rounded-lg shadow-sm transition duration-300">Login</a>
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-300">Create Account</a>
                    </div>
                @endguest
            </div>
        </div>

        <!-- Mobile Navigation (small and below) -->
        <div class="md:hidden">
            <div class="flex items-center justify-between">
                <!-- Logo and Menu Button - Mobile -->
                <div class="flex items-center">
                    <button id="mobileMenuButton" class="mr-2 text-gray-600 focus:outline-none" onclick="toggleMobileMenu()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <a href="{{ route('home') }}" class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
                        <h1 class="text-xl font-bold tracking-tight">Blog Title</h1>
                    </a>
                </div>

                <!-- Auth Button - Mobile -->
                <div>
                    @auth
                        <button class="flex items-center space-x-1 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium py-1.5 px-3 rounded-lg shadow-md" type="button" id="mobileDropdownButton" onclick="toggleMobileDropdown()">
                            <span class="text-sm truncate max-w-[100px]">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="mobileUserDropdown" class="hidden absolute right-4 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 z-10 ring-1 ring-black ring-opacity-5">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                            <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Logout</button>
                            </form>
                        </div>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium py-1.5 px-3 text-sm rounded-lg shadow-md">Login</a>
                    @endguest
                </div>
            </div>

            <!-- Mobile Menu (hidden by default) -->
            <div id="mobileMenu" class="hidden mt-3 pb-2">
                <!-- Search bar - Mobile -->
                <div class="py-2">
                    <form class="flex" method="GET" action="{{ route('home.search') }}" role="search">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input name="query" class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" type="search" placeholder="Search for anything..." aria-label="Search">
                        </div>
                    </form>
                </div>

                <!-- Additional menu items for mobile -->
                <div class="space-y-1">
                    <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:bg-gray-50">Home</a>
                    @guest
                        <a href="{{ route('register') }}" class="block px-3 py-2 text-base font-medium text-gray-700 rounded-md hover:bg-gray-50">Create Account</a>
                    @endguest
                    <!-- Add more menu items as needed -->
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // Mobile menu toggle
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('hidden');
    }

    // Mobile dropdown toggle
    function toggleMobileDropdown() {
        document.getElementById('mobileUserDropdown').classList.toggle('hidden');
    }

    // Desktop dropdown toggle
    function toggleDropdown() {
        document.getElementById('userDropdown').classList.toggle('hidden');
    }

    // Close dropdowns when clicking outside
    window.addEventListener('click', function(e) {
        const mobileDropdownButton = document.getElementById('mobileDropdownButton');
        const dropdownMenuButton = document.getElementById('dropdownMenuButton');

        if (mobileDropdownButton && !mobileDropdownButton.contains(e.target)) {
            document.getElementById('mobileUserDropdown')?.classList.add('hidden');
        }

        if (dropdownMenuButton && !dropdownMenuButton.contains(e.target)) {
            document.getElementById('userDropdown')?.classList.add('hidden');
        }
    });
</script>
