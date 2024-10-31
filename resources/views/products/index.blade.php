<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fce4ec; /* Soft pink background */
            color: #333;
        }
        .sidebar {
            height: 100vh; /* Full height for sidebar */
            background-color: #f8bbd0; 
            color: #fff;
            padding-top: 20px;
            position: fixed; /* Make sidebar fixed */
            width: 220px; /* Set width for sidebar */
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
            margin-left: 240px; /* Margin for the fixed sidebar */
            padding: 20px;
        }
        .card {
            margin: 15px; /* Space between cards */
            border: none; /* Remove border */
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            display: flex; /* Flexbox for vertical alignment */
            flex-direction: column; /* Stack elements vertically */
            justify-content: center; /* Center content */
            align-items: center; /* Center content horizontally */
            text-align: center; /* Center text */
            padding: 20px; /* Add padding */
            transition: transform 0.3s; /* Smooth hover effect */
            width: 100%; /* Set width to 100% */
            max-width: 350px; /* Optional: set a max width for larger screens */
        }
        .card img {
            max-width: 100%; /* Image responsive */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 15px; /* Space below the image */
        }
        .card:hover {
            transform: translateY(-5px); /* Lift effect on hover */
        }
        .btn-edit {
            background-color: #ffcc80; /* Light orange color */
            color: #333;
            margin: 5px; /* Space between buttons */
        }
        .btn-delete {
            background-color: #ff7043; /* Coral color */
            color: white;
            margin: 5px; /* Space between buttons */
        }
        .btn-edit:hover,
        .btn-delete:hover {
            opacity: 0.9; /* Slightly transparent on hover */
        }
    </style>
</head>
<body>
    <div class="d-flex">
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
                <h1 class="text-center">Product List</h1>
                <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add New Product</a>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="row justify-content-center"> <!-- Center the cards -->
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="card">
                                @if($product->pic)
                                    <img src="{{ asset('storage/' . $product->pic) }}" class="card-img-top" alt="Product Image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">${{ $product->price }}</p>
                                    <p class="card-text">Categories: {{ implode(', ', $product->categories->pluck('name')->toArray()) }}</p>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
