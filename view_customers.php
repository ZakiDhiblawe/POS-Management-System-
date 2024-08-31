<!DOCTYPE html>
<html>
<head>
    <title>View Customers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Customer List</h1>
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = oci_connect('system', 'zaki12', 'localhost/XE');

                if (!$conn) {
                    $e = oci_error();
                    echo "<div class='alert alert-danger' role='alert'>Connection failed: " . $e['message'] . "</div>";
                }

                $sql = 'SELECT * FROM Customer1';
                $stmt = oci_parse($conn, $sql);
                oci_execute($stmt);

                while ($row = oci_fetch_assoc($stmt)) {
                    echo "<tr>";
                    echo "<td>" . $row['CUSTOMERID'] . "</td>";
                    echo "<td>" . $row['CUSTOMERNAME'] . "</td>";
                    echo "<td>" . $row['CONTACTNUMBER'] . "</td>";
                    echo "<td>" . $row['EMAIL'] . "</td>";
                    echo "<td>" . $row['USERNAME'] . "</td>";
                    echo "</tr>";
                }

                oci_free_statement($stmt);
                oci_close($conn);
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-secondary">Back to home</a>
    </div>
</body>
</html>
