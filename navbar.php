
<?php
session_start();
?>

<nav class="navbar">

    <div class="nav-left">
        <a href="index.php">Home</a>
        <a href="portfolio.php">Portfolio</a>
        <a href="commissions.php">Commissions</a>
        <a href="order.php">Order</a>
        <a href="about.php">About Me</a>
    </div>

    <div class="nav-right">

        <?php
        if (isset($_SESSION['username'])) {
            echo "<span>Welcome " . $_SESSION['username'] . "</span>";
            echo '<a href="#" onclick="logoutUser(); return false;">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
        ?>

    </div>

</nav>

<div id="logoutPopup" class="popup">You've been logged out, returning to home...</div>
