<?php

include "MySQL_Functions.php";
$connection = getMySQLConnection();



// check to see if the link is valid before showing the form to reset the password
if(isset($_GET['hashValue']) && isset($_GET['email'])) {

    $hashValue = htmlspecialchars(mysqli_real_escape_string($connection, $_GET['hashValue']));
    $email = htmlspecialchars(mysqli_real_escape_string($connection, $_GET['email']));

    $sql = "SELECT * FROM users WHERE email = '$email' AND hashValue = '$hashValue'";
    $result = $connection -> query($sql);

    // if there is not a user with matching email and hash, an invalid link was provided
    if($result -> num_rows === 0) {
        echo "   <script>
                     alert('Reset Password Link is Invalid');
                     window.location.href='forgot.php';
                  </script>";
    } 

    // Link appears invalid
} else {
    // if the reset password form hasnt been submitted and it makes it to this case, the link is invalid
    if(!isset($_POST['password']) && !isset($_POST['passConfirm'])) {
        echo "<script>
                 alert('Reset Password Link is Invalid');
                 window.location.href='forgot.php';
               </script>";
    } 
    // if the reset password form has been submitted, this has already been verified and need to ignore the case
    // get values will be gone when that form is submitted.
}


?>


<!DOCTYPE HTML>
<!--
Arcana by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Reset Password</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    </head>
    <body>
        <div id="page-wrapper">

            <!-- Header -->
            <div id="header">

                <!-- Logo -->
                <h1><a href="index.php" id="logo">Akari</a></h1>

                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="properties.php">Properties</a></li>
                        <li class="current"><a href="loginsignup.php">Login/Sign Up</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Main -->
            <section class="wrapper style1">
                <div class="container">
                    <div id="content">

                        <!-- Content -->

                        <?php

                        // if the reset password form has been submitted
                        if(isset($_POST['password']) && isset($_POST['passConfirm'])) {

                            //escape strings for security
                            $newPassword = htmlspecialchars(mysqli_real_escape_string($connection, (password_hash($_POST['password'], PASSWORD_BCRYPT))));
                            $email = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['email']));

                            // new hash value is used so that link in the email is not longer valid
                            $newHashValue = htmlspecialchars(mysqli_real_escape_string($connection, md5(rand(0,1000))));

                            // query to update the table
                            $sql = "UPDATE users SET password = '$newPassword', hashValue = '$newHashValue' WHERE email = '$email'";

                            $connection -> query($sql);

                            echo "
                                    <header>
				                        <h2>Password Reset Was Successful</h2>
					                    <a href='loginsignup.php'><p>Please Log In Again</p></a>
                                     </header>
                                ";


                            // show the initial form to reset the password
                        } else {
                            echo "
                                    <header>
				                        <h2>Reset Password</h2>
					                    <p>Please Enter and Confirm New Password</p>
                                     </header>
                                     <form action='reset.php' method='post'>
                                        <div class='row 50%'>
                                            <div class='6u 12u(mobilep)'>
                                                <input type='password' name='password' id='password' placeholder='Password' required/>
                                            </div>
                                            <div class='6u 12u(mobilep)'>
                                                <input type='password' name='passConfirm' id='passConfirm' placeholder='Confirm Password' required/>
                                            </div>

                                            <script> 
                                                var password = document.getElementById('password')
                                                , confirm_password = document.getElementById('passConfirm');

                                                function validatePassword(){
                                                    if(password.value != confirm_password.value) {
                                                        confirm_password.setCustomValidity('Passwords Do not Match');
                                                    } else {
                                                        confirm_password.setCustomValidity('');
                                                    }
                                                }
                                                password.onchange = validatePassword;
                                                confirm_password.onkeyup = validatePassword;
                                            </script>

                                        </div>
                                        <input type='hidden' name='email' value='$email'>
                                        <div class='row 50%'>
                                            <div class='12u'>
                                                <ul class='actions'>
                                                    <li><input type='submit' class='button' value='Submit' /></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>"; 

                        }


                        ?>


                    </div>
                </div>
            </section>

            <!-- Footer -->
                     <?php
                        include 'bottom.html';
                        $connection -> close();
                    ?>
        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>

    </body>
</html>

