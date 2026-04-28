<?php
session_start();
include __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT user_id, username, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];

        header("Location: index.php");
        exit();

    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Login</title>
</head>

<body>

<?php include 'navbar.php'; ?>

<h2>Login</h2>

<?php
if (isset($error)) {
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">

    <input name="email" type="email" placeholder="Email" required>

    <input id="password" name="password" type="password" placeholder="Password" required>
    <button type="button" onclick="togglePassword()">Show</button>

    <button type="submit">Login</button>
</form>

<script>
function togglePassword() {
    let pw = document.getElementById("password");
    pw.type = (pw.type === "password") ? "text" : "password";
}
</script>

</body>
</html>