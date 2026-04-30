
$sDbServer = "localhost";
$sDbUser = "root";
$sDbPassword = "";
$sDbDatabase = "commissions";
$conn = null;
try {
    $oDbConn = mysqli_connect($sDbServer, $sDbUser, $sDbPassword, $sDbDatabase);
    $conn = $oDbConn;
} 
catch (\mysqli_sql_exception $e) {
    die(json_encode(["error" => "Connection failed: Error Code = " . $e->getMessage()]));
}

if ($conn === false) {
    die(json_encode(["error" => "Connection failed: Error Code = " . mysqli_connect_error()]));
} 
else {
    echo json_encode(["success" => "Connection successful!"]);
    die(json_encode(["success" => "Connection successful!"]));
}
