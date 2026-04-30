<?php 
    include("header.html");
    include 'navbar.php';
?>

<?php
include 'db.php';


$result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Status</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1 class="page-title">Order Status</h1>

<table border="1" style="margin: auto; background: white;">
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Style</th>
        <th>Status</th>
        <th>Progress</th>
    </tr>

<?php
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['customer_name'] . "</td>";
    echo "<td>" . $row['commission_type'] . "</td>";
    echo "<td>" . $row['style'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td>" . $row['progress'] . "%</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>