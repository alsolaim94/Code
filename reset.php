<?php

include "MySQL_Functions.php";
$connection = getMySQLConnection();



// check to see if the link is valid before showing the form to reset the password
if(isset($_GET['hashValue']) && isset($_GET['email'])) {
    
    $hashValue = mysqli_real_escape_string($connection, $_GET['hashValue']);
    $email = mysqli_real_escape_string($connection, $_GET['email']);
    
    $sql = "SELECT * FROM users WHERE email = '$email' AND hashValue = '$hashValue'";
    $result = $connection -> query($sql);
    
    // if there is not a user with matchin email and hash, an invalid link was provided
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
    // if the reset passwrod form has been submitted, this has already been verified and need to ignore the case
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
						<h1><a href="index.html" id="logo">Akari</a></h1>

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
                            
                            // if the reset password form has been submitted
                            if(isset($_POST['password']) && isset($_POST['passConfirm'])) {
                                
                                //escape strings for security
                                $newPassword = mysqli_real_escape_string($connection, (password_hash($_POST['password'], PASSWORD_BCRYPT)));
                                $email = mysqli_real_escape_string($connection, $_POST['email']);
                                
                                // new hash value is used so that link in the email is not longer valid
                                $newHashValue = mysqli_real_escape_string($connection, md5(rand(0,1000)));
                                
                                // query to update the table
                                $sql = "UPDATE users SET password = '$newPassword', hashValue = '$newHashValue' WHERE email = '$email'";
                                
                                $connection -> query($sql);
                                
                                echo "
                                    <header>
				                        <h2>Password Reset Was Successful</h2>
					                    <a href='loginsignup.html'><p>Please Log In Again</p></a>
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
				<div id="footer">
					<div class="container">
						<div class="row">
							<section class="3u 6u(narrower) 12u$(mobilep)">
								<h3>Links to Stuff</h3>
								<ul class="links">
									<li><a href="#">Mattis et quis rutrum</a></li>
									<li><a href="#">Suspendisse amet varius</a></li>
									<li><a href="#">Sed et dapibus quis</a></li>
									<li><a href="#">Rutrum accumsan dolor</a></li>
									<li><a href="#">Mattis rutrum accumsan</a></li>
									<li><a href="#">Suspendisse varius nibh</a></li>
									<li><a href="#">Sed et dapibus mattis</a></li>
								</ul>
							</section>
							<section class="3u 6u$(narrower) 12u$(mobilep)">
								<h3>More Links to Stuff</h3>
								<ul class="links">
									<li><a href="#">Duis neque nisi dapibus</a></li>
									<li><a href="#">Sed et dapibus quis</a></li>
									<li><a href="#">Rutrum accumsan sed</a></li>
									<li><a href="#">Mattis et sed accumsan</a></li>
									<li><a href="#">Duis neque nisi sed</a></li>
									<li><a href="#">Sed et dapibus quis</a></li>
									<li><a href="#">Rutrum amet varius</a></li>
								</ul>
							</section>
							<section class="6u 12u(narrower)">
								<h3>Get In Touch</h3>
								<form>
									<div class="row 50%">
										<div class="6u 12u(mobilep)">
											<input type="text" name="name" id="name" placeholder="Name" />
										</div>
										<div class="6u 12u(mobilep)">
											<input type="email" name="email" id="email" placeholder="Email" />
										</div>
									</div>
									<div class="row 50%">
										<div class="12u">
											<textarea name="message" id="message" placeholder="Message" rows="5"></textarea>
										</div>
									</div>
									<div class="row 50%">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" class="button alt" value="Send Message" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
						</div>
					</div>

					<!-- Icons -->
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
							<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
							<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
						</ul>

					<!-- Copyright -->
						<div class="copyright">
							<ul class="menu">
								<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>

				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>

