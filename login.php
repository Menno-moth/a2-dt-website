<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>

</head>
<body>

<?php include 'navbar.php'; ?>

</body>
</html>


<?php
session_start();

$_SESSION['username'] = "Menno"; // replace later with real input

header("Location: index.php");
exit;
?>
