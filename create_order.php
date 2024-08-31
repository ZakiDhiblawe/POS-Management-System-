<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Create Order</h1>
        <form action="create_order_action.php" method="post" class="mt-4">
            <div class="form-group">
                <label for="customer_id">Customer ID:</label>
                <input type="number" class="form-control" id="customer_id" name="customer_id" required>
            </div>
            <div class="form-group">
                <label for="product_id">Product ID:</label>
                <input type="number" class="form-control" id="product_id" name="product_id" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Order</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Back to home</a>
    </div>
</body>
</html>
