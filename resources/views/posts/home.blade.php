<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Blog Home Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0; /* Gray background */
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .search-bar {
            max-width: 500px;
            margin: 0 auto;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            border-top: 1px solid #dee2e6;
        }
        .footer a {
            color: #f8f9fa;
            margin: 0 10px;
        }
        .card {
            border-radius: 10px;
            border: none;
            background-color: white;
        }
        .card img {
            border-radius: 10px 10px 0 0;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .sidebar-card {
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            position: relative;
        }
        .sidebar-card::before {
            content: '';
            display: block;
            height: 5px;
            background-color: #007bff; /* Line color */
            border-radius: 10px 10px 0 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
        .sidebar-card .card-body {
            position: relative;
            padding-top: 20px;
        }
        .post-card img {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="mb-0">My Blog</h1>
            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Search...">
            </div>
            <div>
                <a href="#" class="btn btn-custom mr-2">Login</a>
                <a href="#" class="btn btn-custom">Create Account</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <!-- Posts (70%) -->
            <div class="col-lg-8">
                <div class="card post-card">
                    <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">Post Title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><strong>By:</strong> Author Name</span>
                            <span><strong>Date:</strong> August 20, 2024</span>
                            <span><strong>Comments:</strong> 5</span>
                        </div>
                        <a href="#" class="btn btn-custom mt-2">Read More</a>
                    </div>
                </div>

                <!-- Repeat for more posts -->
                <div class="card post-card">
                    <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">Another Post Title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><strong>By:</strong> Author Name</span>
                            <span><strong>Date:</strong> August 19, 2024</span>
                            <span><strong>Comments:</strong> 8</span>
                        </div>
                        <a href="#" class="btn btn-custom mt-2">Read More</a>
                    </div>
                </div>
                <!-- End of Post Cards -->
            </div>

            <!-- Sidebar (30%) -->
            <div class="col-lg-4">
                <!-- Search Card -->
                <div class="card sidebar-card">
                    <div class="card-body">
                        <h5 class="card-title">Search</h5>
                        <input type="text" class="form-control mb-2" placeholder="Search...">
                        <button class="btn btn-custom btn-block">Search</button>
                    </div>
                </div>

                <!-- Authors Card -->
                <div class="card sidebar-card">
                    <div class="card-body">
                        <h5 class="card-title">Authors</h5>
                        <ul class="list-unstyled">
                            <li>Author 1</li>
                            <li>Author 2</li>
                            <li>Author 3</li>
                        </ul>
                    </div>
                </div>

                <!-- Sign-Up Card -->
                <div class="card sidebar-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Join Us</h5>
                        <p>Sign up to get the latest posts and updates.</p>
                        <a href="#" class="btn btn-custom">Create Account</a>
                    </div>
                </div>

                <!-- Categories Card -->
                <div class="card sidebar-card">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Category 1</a></li>
                            <li><a href="#">Category 2</a></li>
                            <li><a href="#">Category 3</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Tags Card -->
                <div class="card sidebar-card">
                    <div class="card-body">
                        <h5 class="card-title">Tags</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Tag 1</a></li>
                            <li><a href="#">Tag 2</a></li>
                            <li><a href="#">Tag 3</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Recent Posts Card -->
                <div class="card sidebar-card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Posts</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Recent Post 1</a></li>
                            <li><a href="#">Recent Post 2</a></li>
                            <li><a href="#">Recent Post 3</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Social Media Card -->
                <div class="card sidebar-card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Follow Us</h5>
                        <a href="#" class="mx-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="mx-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="mx-2"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        <p>&copy; 2024 My Blog. All rights reserved.</p>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="ml-3"><i class="fab fa-twitter"></i></a>
        <a href="#" class="ml-3"><i class="fab fa-instagram"></i></a>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
