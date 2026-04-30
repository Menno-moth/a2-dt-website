


<?php 
    include("header.html");
    include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>

</head>
<body>

		<div class="container" id="loginContainer">
			<header id="headerScriptLocal"></header>
			
			<section class="mainLoginArea">
				<div class="centerAlign">
					<form action = "login.php" method = "post">
						<h1>Login</h1>
						<p class="FNp">
                            <label> Email: </label>
							<input type="email" name="sEmail" id="sEmailID">
						</p>
						
						<p>
							<label> Password:</label>
							<input type="password" name="sPassword" id="sPasswordID">
						</p>
						
						<input type = "submit" name = "sSubmitButton" id = "sSubmitBUttonID" value = "Login">
					</form>
				</div>
			</section>
            
        </div>
</body>
</html> 

        <?php 
            if (isset($_POST["sSubmitButton"])){
                $username = filter_input(INPUT_POST, "sEmail", FILTER_SANITIZE_EMAIL);
                $password = filter_input(INPUT_POST, "sPassword", FILTER_SANITIZE_SPECIAL_CHARS);
                echo "button pressed";
                if (empty($username)) {
                     echo "<script type='text/javascript'>alert('Username Blank');</script>";
                }
                elseif(empty($password)){
                     echo "<script type='text/javascript'>alert('Password Blank');</script>";
                }
                else {
                    # code...
                    echo "Logging in"."<br>";
                    echo $password."<br>";
                    echo $username. "<br>";

                
                }
            
        
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
        


// Build SQL query safely
$sql = "SELECT * FROM users WHERE Email = ?";
echo $sql."<br>";
$sDataTypes = "s"; // s for string, i for integer   
$conn = mysqli_connect("localhost", "root", "", "commissions");
// Check if we can use array to pass day to bind_param;
 $data = array($sDataTypes,  $username);


// Prepare and execute the query

$stmt = $conn->prepare($sql);
if (!$stmt) {
	die(json_encode(["error" => "SQL Prepare Error: " . $conn->error]));
    exit;
}
// Bind parameters
$stmt->bind_param( ...$data);

echo "Uptil here"."<br>";
echo json_encode($data)."<br>";
// Execute statement
$stmt->execute();
$result = $stmt->get_result();
include 'dbDisconnect.php';
echo mysqli_num_rows($result)."<br>";
if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    //echo json_encode($user)."1st<br>";
	//echo json_encode($user['Password'])."<br>";
    //echo password_hash($password, PASSWORD_DEFAULT)."<br>";
	if (password_verify($password, $user['Password'])) {
		// Return user details as JSON
		echo json_encode($user)."<br> Login successful!";
	}
    else {
		echo json_encode(["error" => "Invalid credentials"]);
	}
	
}
else {
    echo json_encode(["error" => "Invalid credentials"]);
}

            }
?>






