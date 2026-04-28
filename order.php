
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Order</title>
</head>

<body>

<?php
include 'db.php';
include 'navbar.php';
?>

<h1 class="page-title">Place an Order</h1>

<form action="submit_order.php" method="POST">

    <label>Name:</label>
    <input type="text" name="customer_name" required>

    <label>Contact:</label>
    <input type="text" name="contact" required>

    <div class="row">

        <div class="column">
            <label>Commission Type:</label>
            <select name="commission_type" required>
                <option value="Headshot">Headshot</option>
                <option value="Bust">Bust</option>
                <option value="Half Body">Half Body</option>
                <option value="Full Body">Full Body</option>
            </select>
        </div>

        <div class="column">
            <label>Style:</label>
            <select name="style" required>
                <option value="Regular">Regular</option>
                <option value="Chibi">Chibi</option>
            </select>
        </div>

    </div>

    <label>Details:</label>
    <textarea name="details" required></textarea>

    <button type="submit">Submit Order</button>

</form>