<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background-color: #ffe6f2; }
    </style>
</head>
<body>
    <div class="container bg-white p-4 rounded shadow-sm mt-5">
        <h2 class="text-center" style="color: #ff6699;">Edit Product</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" style="color: #ff6699;">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="description" style="color: #ff6699;">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price" style="color: #ff6699;">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
                <label for="pic" style="color: #ff6699;">Product Image</label>
                <input type="file" class="form-control-file" id="pic" name="pic">
            </div>
            <button type="submit" class="btn btn-primary btn-block" style="background-color: #ff6699; border: none;">Update Product</button>
        </form>
    </div>
</body>
</html>
