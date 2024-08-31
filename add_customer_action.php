<?php
$conn = oci_connect('system', 'zaki12', 'localhost/XE');

if (!$conn) {
    $e = oci_error();
    echo "<div class='alert alert-danger' role='alert'>Connection failed: " . $e['message'] . "</div>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerName = $_POST['customer_name'];
    $contactNumber = $_POST['contact_number'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'INSERT INTO Customer1 (CustomerID, CustomerName, ContactNumber, Email, Username, Password) 
            VALUES (Customer1_seq.NEXTVAL, :customerName, :contactNumber, :email, :username, :password)';
    $stmt = oci_parse($conn, $sql);

    oci_bind_by_name($stmt, ':customerName', $customerName);
    oci_bind_by_name($stmt, ':contactNumber', $contactNumber);
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':username', $username);
    oci_bind_by_name($stmt, ':password', $password);

    if (oci_execute($stmt)) {
        echo "<div class='alert alert-success' role='alert'>Customer added successfully!</div>";
    } else {
        $e = oci_error($stmt);
        echo "<div class='alert alert-danger' role='alert'>Error adding customer: " . $e['message'] . "</div>";
    }

    oci_free_statement($stmt);
}

oci_close($conn);
?>
<div class="container mt-3">
    <a href="add_customer.php" class="btn btn-secondary">Add Another Customer</a>
    <a href="index.php" class="btn btn-secondary">Back to home</a>
</div>
