<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background-color: #ffe6f2; }
    </style>
</head>
<body>
    <div class="container mt-5 bg-white p-4 rounded shadow-sm">
        <h2 class="text-center" style="color: #ff6699;">Product Details</h2>
        <div class="text-center">
            <img src="{{ asset('storage/' . $product->pic) }}" alt="{{ $product->name }}" class="img-fluid mb-4" style="max-height: 300px;">
        </div>
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> ${{ $product->price }}</p>
        <p><strong>Categories:</strong> {{ implode(', ', $product->categories->pluck('name')->toArray()) }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary" style="background-color: #ff6699; border: none;">Back to List</a>
    </div>
</body>
</html>
