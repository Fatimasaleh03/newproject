<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Admin Panel</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #fce4ec; /* Soft pink background */
            color: #333; 
        }
        .sidebar { 
            width: 220px; 
            background-color: #f8bbd0; /* Soft pink sidebar */
            color: #fff; 
            position: fixed; 
            height: 100vh; 
            padding-top: 20px; /* Padding for the sidebar */
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
            transition: background-color 0.3s; /* Smooth hover transition */
        }
        .sidebar a:hover { 
            background-color: #f48fb1; /* Hover effect */
        }
        .content { 
            margin-left: 240px; 
            padding: 20px; 
        }
        .order-card { 
            background-color: #fff; /* White card background */
            padding: 20px; 
            border-radius: 15px; 
            margin-bottom: 15px; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); 
            transition: transform 0.2s; /* Smooth transform effect */
        }
        .order-card:hover { 
            transform: translateY(-5px); /* Lift effect on hover */
        }
        h1 { 
            font-size: 24px; /* Slightly larger font size for main heading */
            color: #e91e63; /* Pink color for headers */
        }
        .btn-danger { 
            background-color: #ff7043; /* Coral color for delete button */
            border: none; /* Remove border */
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
            <h1>Orders</h1>

            <!-- Order Cards -->
            @foreach($orders as $order)
                <div class="order-card">
                    <h5>Order ID: {{ $order->id }}</h5>
                    <p><strong>Customer:</strong> {{ $order->user->name ?? 'No customer info' }}</p>
                    <p><strong>Product:</strong> {{ $order->product->name ?? 'No product info' }}</p>
                    <p><strong>Price:</strong> ${{ number_format($order->product->price ?? 0, 2) }}</p>
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y') }}</p>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
