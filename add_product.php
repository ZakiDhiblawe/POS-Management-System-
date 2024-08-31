<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Add Product</h1>
        <form action="add_product_action.php" method="post" class="mt-4">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category ID:</label>
                <input type="number" class="form-control" id="category_id" name="category_id" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="stock_level">Stock Level:</label>
                <input type="number" class="form-control" id="stock_level" name="stock_level" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Back to home</a>
    </div>
</body>
</html>
