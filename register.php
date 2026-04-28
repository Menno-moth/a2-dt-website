<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {

        header("Location: login.php");
        exit();

    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>

</head>
<body>

<?php
include 'navbar.php';
?>

<h2>Register</h2>

<form method="POST">
    <input name="username" placeholder="Username" required>
    <input name="email" type="email" placeholder="Email" required>
    <input id="password" name="password" type="password" placeholder="Password" required>
    <button type="button" onclick="togglePassword()">Show</button>
    <button type="submit">Register</button>
</form>

<script>
function togglePassword() {
    let pw = document.getElementById("password");
    pw.type = (pw.type === "password") ? "text" : "password";
}
</script>



</body>
</html>
