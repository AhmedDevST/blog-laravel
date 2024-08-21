<!-- resources/views/partials/subscriber/header.blade.php -->
<header class="p-3 mb-4">
    <div class="container">
        <div class="row align-items-center">
            <!-- Title on the left -->

            <div class="col-md-3 text-start">
                <!-- Link to the home page with no text decoration -->
                <a href="{{ route('home') }}" class="text-decoration-none text-primary-violet">
                    <h1>Blog Title</h1>
                </a>
            </div>

            <!-- Search bar in the center -->
            <div class="col-md-6">
                <form class="d-flex justify-content-center" method="GET" action="{{ route('home.search') }}" role="search">
                    <input name="query"  class="form-control me-2 w-75" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
            <!-- Buttons on the right -->
            <div class="col-md-3 text-end">
                <a href="{{ route('login') }}" class="btn btn-custom me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-create-account">Create Account</a>
            </div>
        </div>
    </div>
</header>
