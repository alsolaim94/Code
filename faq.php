<?php
session_start();
include 'MySQL_Functions.php';


?>

<!DOCTYPE HTML>
<!--
Arcana by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>FAQ</title>
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
                        <li class="current"><a href="properties.php">Properties</a></li>
                        <!-- if the user is logged in, it will show the profile -->
                        <?php
                        if(isset($_SESSION['email'])) {
                            echo "<li><a href='profile.php'>Profile</a></li>";
                        }
                        ?>
                        <li>
                            <!-- if the user is logged in, it will give them the option to log out -->
                            <?php
                            if(isset($_SESSION['email'])) {
                                echo "<a class='logoutButton' onclick='logout()'>Log Out</a>";;
                            } else {
                                echo "<a href='loginsignup.php'>Login/Sign Up</a>";
                            }
                            ?>
                        </li>
                    </ul>
                </nav>

            </div>





            <!-- Main -->
            <section class="wrapper style1">
                <div class="container">
                    <div id="content">

                        <!-- Content -->

                        <section class="12u 12u(narrower)">
						<div style = 'margin-bottom: 30px;'>
                           <h2>FAQ</h2>
						   </div>
                                <div>
									<div  style = 'color: rgb(70, 193, 249);'>
                                    <h3>How do I post a property?
									</div>
									<div style = ' margin-bottom: 30px;'>
                                      <h4>First a user must be logged in. After logging in you can go to your profile page then click "add new property".</h4>
                                    </div>
									<div  style = 'color: rgb(70, 193, 249);'>
                                    <h3>How do I find a property?
									</div>

									<div style = ' margin-bottom: 30px;'>
                                      <h4>Click on the properties tab and filter properties that meet your needs.</h4>
                                    </div>

									<div  style = 'color: rgb(70, 193, 249);'>
                                    <h3>Do I need to sign in to view properties?
									</div>
									<div style = 'margin-bottom: 30px;'>
                                      <h4>No, any user that connects to Akari can view all of our listed properties on the properties page.</h4>
                                    </div>
									

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