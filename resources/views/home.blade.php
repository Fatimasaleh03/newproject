<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincare Store - Home</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/background.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff; /* Default text color */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .jumbotron {
            background-color: transparent; /* Remove background color for the jumbotron */
            color: #fff; /* White text color for the jumbotron */
            text-align: center;
            height: 50vh; /* Height of the jumbotron */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center vertically */
            align-items: center; /* Center horizontally */
            margin-top: 180px; /* Increased margin to push the content down */
        }
        .card {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white cards */
        }
        .card-title {
            color: #e91e63; /* Pink color for product titles */
        }
        .footer {
            background-color: #333; /* Soft black background for the footer */
            color: #fff; /* White text color for the footer */
            text-align: center;
            padding: 1rem 0; /* Padding for footer */
            margin-top: auto; /* Ensure footer stays at the bottom */
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Skincare Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="jumbotron">
        <div class="container">
            <h1 class="display-4">Welcome to Skincare Store</h1>
            <p class="lead">Discover the best skincare products for your needs.</p>
            @if(Auth::check())
                <a href="{{ route('products.index') }}" class="btn btn-outline-light">View Products</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light">View Products</a>

                <p class="mt-2">Don't have an account? <a href="{{ route('register') }}" class="text-light">Register here</a></p>
            @endif
        </div>
    </section>
<!-- Hero Section -->


   

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Skincare Store. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
