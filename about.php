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
					<form id="loginForm">
						<h1>Login</h1>
						<p class="FNp">
							<label for="Email">Email:</label>
							<input type="email" name="loginEmail" id="emailLoginID">
						</p>
						
						<p>
							<label for="Password">Password:</label>
							<input type="password" name="loginPassword" id="passwordLoginID">
						</p>
						
						<button id="submitButtonLogin">Submit</button>
					</form>
				</div>
			</section>
        </div>


</body>
</html>
