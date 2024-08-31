<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Add Customer</h1>
        <form action="add_customer_action.php" method="post" class="mt-4">
            <div class="form-group">
                <label for="customer_name">Customer Name:</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Back to home</a>
    </div>
</body>
</html>
