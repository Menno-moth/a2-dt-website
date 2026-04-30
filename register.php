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

                    <!-- <p class="FNp">
                        <label for="FirstName">First Name:</label>
                        <small>*</small>
                        <input type="text" name="sFirstName" id="sFirstNameID" tabindex="1"
                            size="10" maxlength="10" required pattern="[A-Za-z]+"
                            title="First name should only contain letters." autofocus
                            oninvalid="this.setCustomValidity('Please enter a valid first name.')"
                            oninput="this.setCustomValidity('')">
                    </p>

                    <p>
                        <label for="LastName">Last Name:</label>
                        <small>*</small>
                        <input type="text" name="sLastName" id="sLastNameID" tabindex="2"
                            size="10" maxlength="10" required pattern="[A-Za-z]+"
                            title="Last name should only contain letters."
                            oninvalid="this.setCustomValidity('Please enter a valid last name.')"
                            oninput="this.setCustomValidity('')">
                    </p>

                    <p>
                        <label for="DateOfBirth">Date Of Birth:</label>
                        <input type="date" name="sDateOfBirth" id="sDateOfBirthID" tabindex="3"
                            required pattern="\d{2}-\d{2}-\d{4}" title="Date of Birth should be in the format DD-MM-YYYY.">
                    </p>
                    <p class="FNp">
                        <label> Email: </label>
                        <input type="email" name="sEmail" id="sEmailID" tabindex="4"
                            required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            title="Please enter a valid email address.">
                    </p>

                    <p>
                        <label> Password:</label>
                        <input type="password" name="sPassword" id="sPasswordID" tabindex="5" required
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                            minlength="8" data-toggle="password"
                            title="Password must be at least 8 characters long and include an uppercase letter, a lowercase letter, a number, and a special character.">
                    </p>

                    <p>
                        <label for="PasswordVerification">Retype Password:</label>
                        <input type="password" name="sPasswordVerification" id="sPasswordVerificationID" tabindex="6" required
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                            minlength="8" data-toggle="password">
                    </p>

                    <p id="staffCheckboxDisplay">
                        <label for="StaffCheckbox">Staff Member:</label>
                        <input type="checkbox" name="StaffCheckbox" id="staffID">
                    </p> -->


                    <input type="submit" name="sSubmitButton" id="sSubmitBUttonID" value="Register">
                </form>
                <script>
                    function togglePassword() {
                        let pw = document.getElementById("password");
                        pw.type = (pw.type === "password") ? "text" : "password";
                    }
                </script>
            </div>
        </section>

    </div>
    <?php
    echo "testing";
    ?>
    if (isset($_POST["sSubmitButton"])) {

    <!-- Login Overlay -->
    <div id="loginOverlay"></div>

    <!-- Popup Overlay -->
    <div id="popupOverlay"></div>

    <!-- Popup  -->
    <div id="idlePopup" style="z-index: 120">
        <h2>Sign Out</h2>
        <p>Do you want to sign out?</p>
        <button onclick="signOut()">Yes</button>
        <button id="declineSignOut" onclick="signOutReject()">No</button>
    </div>

    <div></div>
    <footer class="footer" style="left: 0">
        <div class="copyright">&copy;2025 - <strong>Miners Hollow</strong></div>
    </footer>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
    <script src="js/defaultJS.js"></script>

    <script>
        $(document).ready(function() {
            // Retrieving local storage data
            var customerID = sessionStorage.getItem('customerID');
            var isStaffMember = sessionStorage.getItem('isStaffMember');
            isStaffMember = parseInt(isStaffMember);

            // Checking if customer is logged in
            if (customerID && customerID.trim() !== "") {
                document.getElementById('popupOverlay').style.display = 'inline';
                document.getElementById('idlePopup').style.display = 'inline';
                document.getElementById('loginOverlay').style.display = 'none';

                // Checking if they are not staff
                if (isStaffMember !== 1) {
                    document.getElementById('declineSignOut').onclick = signOutReject;
                } else {
                    document.getElementById('declineSignOut').onclick = signOutRejectStaff;
                }
            } else {
                document.getElementById('popupOverlay').style.display = 'none';
                document.getElementById('idlePopup').style.display = 'none';
                document.getElementById('loginOverlay').style.display = 'none';
            }
        })

        function signOut() {
            // Resetting local storage
            sessionStorage.removeItem('customerID');
            sessionStorage.setItem('isStaffMember', 'false');
            sessionStorage.setItem('offerTaught', 0);

            // Redirecting back to homepage
            window.location.href = "MHHomepage.html";
        }

        function signOutReject() {
            // Redirecting back to homepage
            window.location.href = "MHHomepage.html";
        }

        function signOutRejectStaff() {
            // Closing pop up
            document.getElementById('popupOverlay').style.display = 'none';
            document.getElementById('idlePopup').style.display = 'none';
            document.getElementById('loginOverlay').style.display = 'inline';
        }
    </script>

    <script>
        $(document).ready(function() {
            // Handle Signup Form
            $("#signupForm").submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                // Send AJAX request to signup.php
                $.ajax({
                    url: 'RegistrationValidation.php',
                    method: 'POST',
                    data: formData,
                    dataType: 'json', // Expecting JSON response
                    success: function(response) {
                        if (response.errors) {
                            let errorMessage = ""
                            response.errors.forEach(function(error) {
                                errorMessage += error + '\n';
                            });
                            alert(errorMessage);
                            return;
                        }
                        if (response.error) {
                            // Show alert for error
                            alert(response.error);
                            return;
                        }
                        alert("Successfully Registered!")
                        sessionStorage.setItem('customerID', response.CustomerID);
                        sessionStorage.setItem('isStaffMember', response.AccessLevel);
                        window.location.href = "../MHHomepage.html"; // Redirect to a page after successful signup
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            });

            // Handle Login Form
            $("#loginForm").submit(function(e) {
                e.preventDefault(); // Prevent default form submission

                var email = $("input[name='loginEmail']").val();
                var password = $("input[name='loginPassword']").val();

                // Send AJAX request to login.php
                $.ajax({
                    url: 'php/login.php',
                    method: 'POST',
                    data: {
                        Email: email,
                        Password: password
                    },
                    success: function(response) {
                        // Parse the response to handle as JSON
                        var response = JSON.parse(response);

                        if (response.error) {
                            alert(response.error);
                            return;
                        }

                        sessionStorage.setItem('customerID', response.CustomerID);
                        sessionStorage.setItem('isStaffMember', response.AccessLevel);
                        alert("Login successful!");
                        window.location.href = "../MHProductPage.html"; // Redirect to a page after successful login
                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + error);
                    }
                });
            });
        });
    </script>

    <script>
        const staffCheckbox = document.getElementById("staffCheckboxDisplay");

        if (sessionStorage.getItem('isStaffMember') == 1) {
            staffCheckbox.style.display = 'inline';
        } else {
            staffCheckbox.style.display = 'none';
        }
    </script>




</body>

</html>