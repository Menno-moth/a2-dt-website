<?php
include("header.html");
include 'navbar.php';
?>


<?php
// include 'db.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//     $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
//     $stmt->bind_param("sss", $username, $email, $password);

//     if ($stmt->execute()) {

//         header("Location: login.php");
//         exit();

//     } else {
//         echo "Error: " . $conn->error;
//     }
// }
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <link href="css/loginCSS.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="container" id="loginContainer">
        //<header id="headerScriptLocal"></header>

        <section class="mainLoginArea">
            <div class="centerAlign">
                <form action="register.php" method="post">
                    <h1>Register</h1>
                    <p class="FNp">
                        <label for="FirstName">First Name:</label>
                        <small>*</small>
                        <input type="text" name="sFirstName" id="sFirstNameID" tabindex="1"
                   
                    </p>

                    <p>
                        <label for="LastName">Last Name:</label>
                        <small>*</small>
                        <input type="text" name="sLastName" id="sLastNameID" tabindex="2"
          
                    </p>

                    <p>
                        <label for="DateOfBirth">Date Of Birth:</label>
                        <input type="date" name="sDateOfBirth" id="sDateOfBirthID" tabindex="3"
                    </p>
                    <p class="FNp">
                        <label> Email: </label>
                        <input type="email" name="sEmail" id="sEmailID" tabindex="4"
                    </p>

                    <p>
                        <label> Password:</label>
                        <input type="password" name="sPassword" id="sPasswordID" tabindex="5" >
                    </p>

                    <p>
                        <label for="PasswordVerification">Retype Password:</label>
                        <input type="password" name="sPasswordVerification" id="sPasswordVerificationID" tabindex="6" >
                    </p>

                    <p id="staffCheckboxDisplay">
                        <label for="StaffCheckbox">Staff Member:</label>
                        <input type="checkbox" name="StaffCheckbox" id="staffID">
                    </p>

               


                    <input type="submit" name="sSubmitButton" id="sSubmitBUttonID" value="Register">
                </form>
                
            </div>
        </section>

    </div>
 

</body>

</html>

<?php 


// Acquiring data from form with filtering and sanitization.
if (isset($_POST["sSubmitButton"])){
                $firstName = filter_input(INPUT_POST, "sFirstName", FILTER_SANITIZE_SPECIAL_CHARS);
                $lastName = filter_input(INPUT_POST, "sLastName", FILTER_SANITIZE_SPECIAL_CHARS);
                $dateOfBirth = filter_input(INPUT_POST, "sDateOfBirth", FILTER_SANITIZE_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "sEmail", FILTER_SANITIZE_EMAIL);               
                $password = filter_input(INPUT_POST, "sPassword", FILTER_SANITIZE_SPECIAL_CHARS);
                $Role = isset($_POST["StaffCheckbox"]) ? 1 : 0;
                
                echo "button pressed From Register php <br>";
                echo $password."<br>";
                echo $email. "<br>";
                echo $firstName. "<br>";
                echo $lastName. "<br>"; 
                echo $dateOfBirth. "<br>";
                echo $email. "<br>";



// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo "Hashed Password: " . $hashedPassword . "<br>";

// Prepare SQL statement to prevent SQL injection
$sql = "INSERT INTO users (FirstName, LastName, DateOfBirth, Email, Password, Role) 
        VALUES (?, ?, ?, ?, ?, ?)";
$sDataTypes = "sssssi"; // s for string, i for integer   

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect("localhost", "root", "", "commissions");

if ($conn === false) {
    die(json_encode(["error" => "Could not connect: " . mysqli_connect_error()]));
}




$stmt = $conn->prepare($sql);

// Check if prepare failed
if ($stmt === false) {
    echo json_encode(["error" => "SQL Error: " . $conn->error]);
    exit;
}

// Check if we can use array to pass day to bind_param;
 $data = array($sDataTypes, $firstName, $lastName, $dateOfBirth, $email, $hashedPassword, $Role);

// Bind parameters
$stmt->bind_param( ...$data);

// Execute statement
if ($stmt->execute()) {
	// Creating user object
	$user = [
        "FirstName" => $firstName,
        "LastName" => $lastName,
        "DateOfBirth" => $dateOfBirth,
        "Email" => $email,
        "Role" => $Role,
        "CustomerID" => $stmt->insert_id,
    ];
	
    // Redirect to login page
    echo json_encode($user);
} else {
    echo json_encode(["error" => "ERROR: Could not execute query. " . $stmt->error]);
}

mysqli_close($conn);

// $conn = new mysqli("localhost", "root", "", "commissions");
// $sql = "INSERT INTO users (FirstName, LastName, DateOfBirth, Email, Password, Role) 
//         VALUES ($firstName, $lastName, $dateOfBirth, $email, $hashedPassword, 0)";
// mysqli_query($conn, $sql);
// mysqli_close($conn);
$sDbServer = "localhost";
$sDbDatabase = "commissions";
$sDbUser = "root";
$sDbPassword = "root";
//include 'db.php';
}
?>




                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                