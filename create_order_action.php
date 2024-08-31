<?php
$conn = oci_connect('system', 'zaki12', 'localhost/XE');

if (!$conn) {
    $e = oci_error();
    echo "<div class='alert alert-danger' role='alert'>Connection failed: " . $e['message'] . "</div>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerID = $_POST['customer_id'];
    $productID = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Create Order
    $sql = 'BEGIN INSERT INTO Orders1 (OrderID, OrderDate, CustomerID, TotalAmount) 
            VALUES (seq_order_id1.NEXTVAL, SYSDATE, :customerID, 0) RETURNING OrderID INTO :orderID; END;';
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ':customerID', $customerID);
    oci_bind_by_name($stmt, ':orderID', $orderID, 32);

    if (oci_execute($stmt)) {
        // Add Order Details
        $sql = 'INSERT INTO OrderDetail1 (OrderDetailID, OrderID, ProductID, Quantity, UnitPrice, TotalPrice)
                SELECT seq_order_detail_id1.NEXTVAL, :orderID, p.ProductID, :quantity, p.Price, p.Price * :quantity
                FROM Product1 p WHERE p.ProductID = :productID';
        $stmt = oci_parse($conn, $sql);

        oci_bind_by_name($stmt, ':orderID', $orderID);
        oci_bind_by_name($stmt, ':productID', $productID);
        oci_bind_by_name($stmt, ':quantity', $quantity);

        if (oci_execute($stmt)) {
            // Update Order Total Amount
            $sql = 'UPDATE Orders1 o
                    SET o.TotalAmount = (SELECT SUM(od.TotalPrice) FROM OrderDetail1 od WHERE od.OrderID = o.OrderID)
                    WHERE o.OrderID = :orderID';
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ':orderID', $orderID);

            if (oci_execute($stmt)) {
                echo "<div class='alert alert-success' role='alert'>Order created successfully!</div>";
            } else {
                $e = oci_error($stmt);
                echo "<div class='alert alert-danger' role='alert'>Error updating order total amount: " . $e['message'] . "</div>";
            }
        } else {
            $e = oci_error($stmt);
            echo "<div class='alert alert-danger' role='alert'>Error adding order details: " . $e['message'] . "</div>";
        }
    } else {
        $e = oci_error($stmt);
        echo "<div class='alert alert-danger' role='alert'>Error creating order: " . $e['message'] . "</div>";
    }

    oci_free_statement($stmt);
}

oci_close($conn);
?>
<div class="container mt-3">
    <a href="create_order.php" class="btn btn-secondary">Create Another Order</a>
    <a href="index.php" class="btn btn-secondary">Back to home</a>
</div>
