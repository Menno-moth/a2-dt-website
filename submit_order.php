<?php 
    include("header.html");
    include 'navbar.php';
?>

<?php
include 'db.php';

$customer_name = $_POST['customer_name'];
$contact = $_POST['contact'];
$commission_type = $_POST['commission_type'];
$style = $_POST['style'];
$details = $_POST['details'];

$sql = "INSERT INTO orders (customer_name, contact, commission_type, style, details, status, progress)
        VALUES ('$customer_name', '$contact', '$commission_type', '$style', '$details', 'pending', 0)";

if ($conn->query($sql) === TRUE) {
    echo "Order inserted successfully";
} else {
    echo "SQL Error: " . $conn->error;
}
?>