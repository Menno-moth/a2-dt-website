<?php
$sDbServer = "localhost";
$sDbUser = "root";
$sDbPassword = "";
$sDbDatabase = "commissions";
$conn = null;
try {
    $oDbConn = mysqli_connect($sDbServer, $sDbUser, $sDbPassword, $sDbDatabase);
    $conn = $oDbConn;
} 
catch (\mysqli_sql_exception) {
   echo "Could not connect";
}

if ($conn) {
    echo "You are connected to the database!";
    
    }
?>