
try {
    mysqli_close($conn);
} 
catch (mysqli_sql_exception $e) {
    die(json_encode(["error" => "Disconnection failed: Error Code = " . $e->getMessage()]));
}