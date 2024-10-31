<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background-color: #ffe6f2; }
        .container { max-width: 600px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container bg-white p-4 rounded shadow-sm">
        <h2 class="text-center" style="color: #ff6699;">Add New Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" style="color: #ff6699;">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description" style="color: #ff6699;">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="price" style="color: #ff6699;">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="pic" style="color: #ff6699;">Product Image</label>
                <input type="file" class="form-control-file" id="pic" name="pic">
            </div>
            <div class="form-group">
                <label for="categories" style="color: #ff6699;">Categories</label>
                <select class="form-control" id="categories" name="categories[]" multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block" style="background-color: #ff6699; border: none;">Create Product</button>
        </form>
    </div>
</body>
</html>
