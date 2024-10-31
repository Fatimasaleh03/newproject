<!-- resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
    <style>
        body {
            background-color: #f8f9fa; /* Light background for the main content */
            min-height: 100vh; /* Ensure full height for body */
        }
        .sidebar {
            background-color: #f4c8e2; /* Soft pinkish color for the sidebar */
            min-width: 250px;
            height: 100vh; /* Full height for sidebar */
            position: fixed; /* Fixed position for sidebar */
            top: 0; /* Align to top */
            left: 0; /* Align to left */
            padding: 20px; /* Add padding */
        }
        .sidebar .nav-link {
            color: #343a40; /* Dark text for sidebar links */
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.3); /* Hover effect */
        }
        .content {
            margin-left: 260px; /* Space for the sidebar */
            padding: 20px; /* Padding for content */
        }
        .card {
            border-radius: 10px; /* Rounded corners for cards */
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4 class="text-center">Admin Dashboard</h4>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
    </ul>
</div>

<!-- Main content -->
<div class="content">
    <h1>Welcome, Admin</h1>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-center bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text display-4">{{ $productCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text display-4">{{ $orderCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">Total Categories</h5>
                        <p class="card-text display-4">{{ $categoryCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sales Overview</h5>
                        <canvas id="salesChart"></canvas> <!-- Canvas for the chart -->
                    </div>
                </div>
            </div>
        </div>

       
    </div>
</div>

<script>
    // Sample data for the chart
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Sales',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
