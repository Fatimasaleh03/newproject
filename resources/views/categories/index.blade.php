<!-- resources/views/categories/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fce4ec; 
            color: #333;
        }
        .sidebar {
            height: 100vh;
            background-color: #f8bbd0; 
            color: #fff;
            padding-top: 20px;
            position: fixed; /* Make sidebar fixed */
            width: 200px; /* Set width for sidebar */
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
            background-color: #f48fb1;
            text-decoration: none;
        }
        .content {
            margin-left: 220px; /* Adjusted for the fixed sidebar width */
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
        .card-title {
            overflow-wrap: break-word; /* Break long words */
            text-align: center; /* Center text */
            width: 100%; /* Make sure it takes full width */
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
                <h1 class="text-center">Categories</h1>
                <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Add Category</a>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <div class="row justify-content-center"> <!-- Center the cards -->
                    @foreach($categories as $category)
                        <div class="col-md-4">
                            <div class="card">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <div>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-edit">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete">Delete</button>
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
