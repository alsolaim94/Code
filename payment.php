<?php
session_start();
include "MySQL_Functions.php";
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
    echo "You must log in before viewing your profile page!";
    header("location: loginsignup.html");    
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
        <title>Your Profile</title>
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
                        <li class="current"><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </nav>

            </div>

            <!-- Main -->
            <section class="wrapper style1">
                <div class="container">


                    <!-- Content -->

                    <?php

                    $email = $_SESSION['email'];
                    $firstName = $_SESSION['firstName'];
                    $lastName = $_SESSION['lastName'];
                    $active = $_SESSION['active'];
                    $id = $_SESSION['id'];

                    ?>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                        <input type="hidden" name="cmd" value="_xclick">
                        <br> Pay To The Order Of<br>
                        <input type="email" name="business" value="y.alsudiriy@gmail.com">
                        <input type="hidden" name="item_name" value="rent">
                        <input type="hidden" name="item_number" value="123">
                        <br> Price<br>
                        <input type="number" name="amount" value="15.00">
                        <br> <br>
                        <h1>Billing </h1>
                        <input type="text" name="first_name" value="<?php echo $firstName; ?>">  
                        <input type="text" name="last_name" value="<?php echo $lastName; ?>">


                        <input type="text" name="address1" value="2618 Oriole st">
                        <input type="text" name="address2" value="">
                        <input type="text" name="city" value="Bowling Green">
                        <input type="text" name="state" value="Ky">
                        <input type="text" pattern="[0-9]{5}" name="zip" value="42101">
                        <input type="hidden" name="night_phone_a" value="270">
                        <input type="hidden" name="night_phone_b" value="996">
                        <input type="hidden" name="night_phone_c" value="2274">
                        <input type="hidden" name="email" value="f.alsolaim@gmail.com">
                        <input type="image" name="submit"
                               src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                               alt="PayPal - The safer, easier way to pay online">
                    </form>  

                    <form action="your-server-side-code" method="POST">
                        <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
                                data-amount="999"
                                data-name="Stripe.com"
                                data-description="Example charge"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto"
                                data-zip-code="true">
                        </script>
                    </form>                     






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