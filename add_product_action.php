<?php
$conn = oci_connect('system', 'zaki12', 'localhost/XE');

if (!$conn) {
    $e = oci_error();
    echo "<div class='alert alert-danger' role='alert'>Connection failed: " . $e['message'] . "</div>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product_name'];
    $categoryID = $_POST['category_id'];
    $price = $_POST['price'];
    $stockLevel = $_POST['stock_level'];

    $sql = 'BEGIN add_product(:productName, :categoryID, :price, :stockLevel); END;';
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ':productName', $productName);
    oci_bind_by_name($stmt, ':categoryID', $categoryID);
    oci_bind_by_name($stmt, ':price', $price);
    oci_bind_by_name($stmt, ':stockLevel', $stockLevel);

    if (oci_execute($stmt)) {
        echo "<div class='alert alert-success' role='alert'>Product added successfully!</div>";
    } else {
        $e = oci_error($stmt);
        echo "<div class='alert alert-danger' role='alert'>Error adding product: " . $e['message'] . "</div>";
    }

    oci_free_statement($stmt);
}

oci_close($conn);
?>
<div class="container mt-3">
    <a href="add_product.php" class="btn btn-secondary">Add Another Product</a>
    <a href="index.php" class="btn btn-secondary">Back to home</a>
</div>
