<?php
session_start();
include "MySQL_Functions.php";
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
    echo "You must log in before viewing your profile page!";
    header("location: loginsignup.php");
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
                        <li><a class='logoutButton' onclick='logout()'>Log Out</a></li>
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
                        <h2>Pay To The Order Of</h2>
                        Email<br>
                        <select name="business" required>
                            <?php
                                $connection = getMySQLConnection();
                                $sql = "SELECT email FROM users WHERE id IN (SELECT landlordID FROM rental WHERE renterID = ".$id.")";
                                $result = $connection -> query($sql);
                                $html = "";
                                echo $sql;
                                if($result -> num_rows > 0) {
                                    while($row = $result -> fetch_assoc()) {
                                        $html .= "<option value='".$row['email']."'>".$row['email']."</option>";
                                    }
                                } else {
                                    $html = "<option value=''>You have not rented a property</option>";
                                }

                                echo $html;
                            ?>
                        </select>
                        <br>
                        <input type="hidden" name="item_name" value="rent">
                        <input type="hidden" name="item_number" value="123">
                        <br> Price<br>
                        <input type="number" name="amount" placeholder=" Amount" required>
                        <br> <br>
                        <h2>Billing</h2>
                        <h1>Name</h1>
                        <input type="text" name="first_name" placeholder="First Name" value="<?php echo $firstName; ?>" required>  
                        <input type="text" name="last_name" placeholder="Last Name" value="<?php echo $lastName; ?>" required>
                        <h1>Street Address</h1>
                        <input type="text" name="address1" placeholder="Street and Number P.O. Box C/O" required>
                        <input type="text" name="address2" placeholder="Apartment, Suite, Unit, Building, Floor, etc.">
                        <input type="text" name="city" placeholder="City">
                        <input type="text" name="state" placeholder="State">
                        <input type="text" pattern="[0-9]{5}" name="zip" placeholder="Zip Code">
                       <br>
                        <input type="image" name="submit"
                               src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                               alt="PayPal - The safer, easier way to pay online">
                    </form>  


                </div>
            </section>

        </div>
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