<?php
session_start();
include 'MySQL_Functions.php';

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
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
        <title>Search Properties</title>
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
                            <h3>Adding Your Property</h3>
                            <form action='registerProperty.php' method='post'>
                                <div class="row 50%">

                                    <br>Name<br>
                                    <div class="9u 12u(mobilep)">
                                        <input type="text" name="propertyName" id="name" placeholder="Name your Property" required/>
                                    </div>

                                </div>

                                <div class="row 50%">
                                    <br>Address<br>

                                    <div class="9u 12u(mobilep)">
                                        <input type="text" name="country" id="name" placeholder="Country" required/>
                                    </div>

                                    <div class="9u 12u(mobilep)">
                                        <input type="text" name="address" id="name" placeholder="Street address" required/>
                                    </div>

                                    <div class="4u 12u(mobilep)">
                                        <input type="text" name="city" id="name" placeholder="City" required/>
                                    </div>

                                    <div class="4u 12u(mobilep)">
                                        <input type="text" name="state" id="name" placeholder="State / Province / Region" required/>
                                    </div>

                                    <div class="4u 12u(mobilep)">
                                        <input type="text" name="zipcode" id="name" placeholder="Zip Code" required/>
                                    </div>

                                </div>

                                <div class="row 50%">
                                    <br>Type<br>

                                    <div class="9u 12u(mobilep)">
                                        <input type="radio" name="type" value="residential" checked> Residential<br>
                                    </div>

                                    <div class="9u 12u(mobilep)">
                                        <input type="radio" name="type" value="commercial"> Commercial<br>
                                    </div>
                                    <div class="9u 12u(mobilep)">
                                        <input type="radio" name="type" value="other"> Other<br><br>
                                    </div>
                                </div>



                                <div class="row 50%">

                                    <br>Features<br>

                                    <div class="10u 12u(mobilep)">
                                        <input type="number" name="size" id="name" placeholder="Size" required/>
                                    </div>

                                    <div class="10u 12u(mobilep)">
                                        <input type="number" name="bedroom" id="name" placeholder="Number of Bedrooms" required/>
                                    </div>

                                    <div class="10u 12u(mobilep)">
                                        <input type="number" name="bathroom" id="name" placeholder="Number of Bathrooms" required/>
                                    </div>

                                    <div class="12u">
                                        <textarea type="text" name="extra" id="name" placeholder="Extra Description" rows="5"></textarea>
                                    </div>

                                </div>


                                <div class="row 50%">
                                    <br>Lease Term<br>

                                    <div class="9u 12u(mobilep)">
                                        <input type="radio" name="lease" value="monthly" checked> Monthly<br>
                                    </div>

                                    <div class="9u 12u(mobilep)">
                                        <input type="radio" name="lease" value="annually"> Annually<br>
                                    </div>
                                </div>

                                <div class="row 50%">

                                    <br>Price<br>

                                    <div class="10u 12u(mobilep)">
                                        <input type="number" name="price" id="name" placeholder="Price Per Month" required/>

                                    </div>

                                </div>


                                <div class="row 50%">
                                    <br>Availability<br>



                                    <div class="10u 12u(mobilep)">
                                        <input type="date" name="availability" id="date" placeholder="YYYYMMDD"/>

                                    </div>

                                </div>

                                <div class="row 50%">

                                    <br>Construction<br>

                                    <div class="10u 12u(mobilep)">
                                        <input type="date" name="contraction" id="date" placeholder="YYYY"  />
                                    </div>

                                    <div class="12u">
                                        <textarea type="text" name="problem" id="name" placeholder="Problems if there is any" rows="2"></textarea>
                                    </div>


                                </div>

                                <div class="row 50%">
                                    <div class="12u">
                                        <ul class="actions">
                                            <li><input type="submit" class="button" value="Register" /></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>

                        </section>

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