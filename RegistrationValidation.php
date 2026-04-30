<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect("localhost", "root", "root", "miners_hollow");

if ($conn === false) {
    die(json_encode(["error" => "Could not connect: " . mysqli_connect_error()]));
}

// Taking all values from the form data (input)
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$DateOfBirth = $_POST['DateOfBirth'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$PasswordVerification = $_POST['PasswordVerification'];
$Staff = isset($_POST['StaffCheckbox']) ? 1 : 0;

// General Validation
if (empty($FirstName)) {
    echo json_encode(["error" => "First Name is required."]);
    exit;
}
if (empty($LastName)) {
    echo json_encode(["error" => "Last Name is required."]);
    exit;
}
if (!$DateOfBirth) {
    echo json_encode(["error" => "Date Of Birth is required."]);
    exit;
}
if (empty($Email)) {
    echo json_encode(["error" => "Email is required."]);
    exit;
}
if (empty($Password)) {
    echo json_encode(["error" => "Password is required."]);
    exit;
}

// Password Validation
$passwordErrors = [];

// Checking the length
if (strlen($Password) < 4) {
    $passwordErrors[] = "Password must be at least 4 characters long.";
}

if (strlen($Password) > 32) {
    $passwordErrors[] = "Password must not exceed 32 characters.";
}

// Contains an uppercase letter
if (!preg_match('/[A-Z]/', $Password)) {
    $passwordErrors[] = "Password must contain at least one uppercase letter.";
}

// Contains a lowercase letter
if (!preg_match('/[a-z]/', $Password)) {
    $passwordErrors[] = "Password must contain at least one lowercase letter.";
}

// Contains a number
if (!preg_match('/[0-9]/', $Password)) {
    $passwordErrors[] = "Password must contain at least one number.";
}

// Contains a special character
if (!preg_match('/[\W_]/', $Password)) {
    $passwordErrors[] = "Password must contain at least one special character.";
}

// Ensuring passwords are identical
if ($Password !== $PasswordVerification) {
    $passwordErrors[] = "Passwords do not match.";
}

if (!empty($passwordErrors)) {
    echo json_encode(["errors" => $passwordErrors]);
    exit;
}

// Name Validation
$nameErrors = [];

// Checking the length
if (strlen($FirstName) < 2) {
    $nameErrors[] = "First Name must be at least 2 characters long.";
}

if (strlen($LastName) < 2) {
    $nameErrors[] = "Last Name must be at least 2 characters long.";
}

if (!empty($nameErrors)) {
    echo json_encode(["errors" => $nameErrors]);
    exit;
}

// Email Validation
if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["error" => "Invalid email address."]);
    exit;
}

// Date Of Birth Validation
date_default_timezone_set('Europe/London');
function validateDate($date, $format = 'Y-m-d') {
    $testdate = DateTime::createFromFormat($format, $date);
    return $testdate && $testdate->format($format) === $date;
}

if (!validateDate($DateOfBirth, 'Y-m-d')) {
    echo json_encode(["error" => "Invalid date of birth."]);
    exit;
}

$DateOfBirthDT = new DateTime($DateOfBirth);
$yesterday = new DateTime('yesterday');
$year = (int)$DateOfBirthDT->format('Y');

// Sensible year date
if ($year < 1850 || $DateOfBirthDT > $yesterday) {
    echo json_encode(["error" => "Date of birth must be between 1850 and yesterday."]);
    exit;
}

// Hash password
$hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

// Checking to see if customer already exists
$checkSql = "SELECT * FROM customers WHERE Email = ?";
$checkStmt = $conn->prepare($checkSql);

// Check if check prepare failed
if ($checkStmt === false) {
    echo json_encode(["error" => "SQL Error: " . $conn->error]);
    exit;
}

// Bind check parameters
$checkStmt->bind_param("s", $Email);

$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    echo json_encode(["error" => "Customer with this email already exists."]);
    exit;
}

// Prepare SQL statement to prevent SQL injection
$sql = "INSERT INTO customers (FirstName, LastName, DateOfBirth, Email, Password, AccessLevel) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Check if prepare failed
if ($stmt === false) {
    echo json_encode(["error" => "SQL Error: " . $conn->error]);
    exit;
}

// Bind parameters
$stmt->bind_param("sssssi", $FirstName, $LastName, $DateOfBirth, $Email, $hashedPassword, $Staff);

// Execute statement
if ($stmt->execute()) {
	// Creating user object
	$user = [
        "FirstName" => $FirstName,
        "LastName" => $LastName,
        "DateOfBirth" => $DateOfBirth,
        "Email" => $Email,
        "AccessLevel" => $Staff,
        "CustomerID" => $stmt->insert_id,
    ];
	
    // Redirect to login page
    echo json_encode($user);
} else {
    echo json_encode(["error" => "ERROR: Could not execute query. " . $stmt->error]);
}

mysqli_close($conn);
?>