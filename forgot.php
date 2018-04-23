<?php

include "MySQL_Functions.php";
include "Mail_Functions.php";

$connection = getMySQLConnection();

?>


<!DOCTYPE HTML>
<!--
Arcana by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Forgot Password</title>
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
                        <li class="current"><a href="loginsignup.html">Login/Sign Up</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Main -->
            <section class="wrapper style1">
                <div class="container">
                    <div id="content">

                        <!-- Content -->

                        <?php
                        // if the forgot password form has been submitted
                        if(isset($_POST["email"])) {
                            $email = mysqli_real_escape_string($connection, $_POST['email']);
                            $userExists = $connection -> query("SELECT * FROM users WHERE email = '$email'");
                            // if the user does not exists
                            if($userExists -> num_rows === 0) {
                                echo "   <script>
                                                    alert('There is no account with this email address');
                                                    window.location.href='forgot.php';
                                                 </script>";

                                // if the user exists
                            } else {
                                $user = $userExists -> fetch_assoc();
                                $email = $user['email'];
                                $hashValue = $user['hashValue'];
                                $firstName = $user['firstName'];

                                // email
                                $to = $email;
                                $subject = "Password Reset for Akari User Account";
                                $body = 
                                    "Hello " . $firstName . ",

It seems you have forgotten your password.

Please follow this link to reset your password: 

http://localhost/code/reset.php?email=".$email."&hashValue=".$hashValue;


                                // provide the required information to send the email
                                $mail = getMailObject();
                                $mail -> addAddress($email);
                                $mail -> Subject = $subject;
                                $mail -> Body = $body;

                                // if the email does not send
                                if(!$mail -> send()) {
                                    echo "
                                                <a href='loginsignup.html'>
                                                    <h4>There was a problem sending an email to the provided address. Please Try Again</h4>
                                                </a>";

                                    // email sent successfully
                                } else {
                                    echo "
                                                <header>
                                                    <h2>An Email Has Been Sent To ". $email ."</h2>
                                                    <p>Please Follow the Instructions to Reset Your Passsord</p>
                                                    <a href='loginsignup.html'>Return to Login</a>
                                                </header>";
                                }
                            }


                            // if the form has not yet been submitted, show the form
                        } else {
                            echo "
                                        <header>
				                            <h2>Forgot Password</h2>
					                        <p>Please Enter the Email Associated with Your Account</p>
                                        </header>
                                        <form action='forgot.php' method='post'>
                                            <div class='row 50%'>
                                                <div class='6u 12u(mobilep)'>
                                                    <input type='email' name='email' id='name' placeholder='Email' />
                                                </div>
                                            </div>
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
                    <?php include 'bottom.html';?>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>

    </body>
</html>

