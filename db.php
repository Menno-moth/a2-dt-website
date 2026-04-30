<?php



$oDbConn = "";

$oDbConn = mysqli_connect($sDbServer, $sDbUser, $sDbPassword, $sDbDatabase);


$conn = new mysqli("localhost", "root", "root", "commissions");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
