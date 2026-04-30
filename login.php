


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
            }
        ?>



