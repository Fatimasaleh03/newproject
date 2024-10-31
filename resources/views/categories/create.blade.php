<!-- resources/views/categories/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fce4ec; /* Background color */
            color: #333;
            height: 100vh; /* Full height for the body */
            margin: 0; /* Remove default margin */
        }
        .sidebar {
            height: 100vh; /* Full height for the sidebar */
            background-color: #f8bbd0; 
            color: #fff;
            padding-top: 20px;
            position: fixed; /* Make sidebar fixed */
            width: 220px; /* Set width for sidebar */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Add shadow for better visibility */
        }
        .sidebar hr {
            border: 1px solid #fff; /* Line color */
            margin: 5px 0; /* Space between the lines and the links */
        }
        .sidebar a {
            color: #fff;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #f48fb1; /* Hover effect */
            text-decoration: none;
        }
        .content {
            margin-left: 240px; /* Add margin for sidebar space */
            display: flex; /* Use flexbox for centering */
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
            height: 100vh; /* Full height for content */
        }
        .card {
            background-color: #fff; /* Card background color */
            border-radius: 15px; /* Rounded corners */
            padding: 30px; /* Add padding */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            width: 400px; /* Set a fixed width */
            height: 400px; /* Set a fixed height */
            display: flex; /* Use flexbox for inner content */
            flex-direction: column; /* Stack elements vertically */
            align-items: center; /* Center inner elements */
            justify-content: center; /* Center inner elements */
        }
        .form-group {
            width: 100%; /* Full width for input */
            margin-bottom: 20px; /* Space below input */
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center">Dashboard</h3>
        <hr>
        <a href="{{ route('home') }}">Home</a>
        <hr>
        <a href="{{ route('categories.index') }}">Categories</a>
        <hr>
        <a href="{{ route('products.index') }}">Products</a>
        <hr>
        <a href="{{ route('orders.index') }}">Orders</a>
        <hr>
    </div>
    
    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <div class="card">
                <h2 class="text-center">Add New Category</h2>
                <form action="{{ route('categories.store') }}" method="POST" style="width: 100%;">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Save Category</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
