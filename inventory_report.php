<!DOCTYPE html>
<html>
<head>
    <title>Inventory Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Inventory Report</h1>
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Stock Level</th>
                    <th>Category Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = oci_connect('system', 'zaki12', 'localhost/XE');

                if (!$conn) {
                    $e = oci_error();
                    echo "<div class='alert alert-danger' role='alert'>Connection failed: " . $e['message'] . "</div>";
                }

                $sql = 'SELECT * FROM InventoryReport1';
                $stmt = oci_parse($conn, $sql);
                oci_execute($stmt);

                while ($row = oci_fetch_assoc($stmt)) {
                    echo "<tr>";
                    echo "<td>" . $row['PRODUCTID'] . "</td>";
                    echo "<td>" . $row['PRODUCTNAME'] . "</td>";
                    echo "<td>" . $row['STOCKLEVEL'] . "</td>";
                    echo "<td>" . $row['CATEGORYNAME'] . "</td>";
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
