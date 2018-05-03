<?php
session_start();
include "MySQL_Functions.php";

$connection = getMySQLConnection();

// query information about the property that is being edited
$sql = "SELECT * FROM property WHERE propertyID = ".$_GET["propertyID"]." AND address = '".$_GET["address"]."'";
$results = $connection -> query($sql);

$propertyID = $_GET["propertyID"];

$_SESSION['propertyID'] = $propertyID;


// array that holds query results
$row = $results -> fetch_assoc();

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
                        <!-- if the user is logged in, it will give them the option to log out -->
                        <?php
                        if(isset($_SESSION['email'])) {
                            echo "<li><a class='logoutButton' onclick='logout()'>Log Out</a></li>";
                        } else {
                            echo "<li><a href='loginsignup.php'>Login/Sign Up</a></li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>    


            <!-- Main -->
            <section class="wrapper style1">
                <div class="container">
                    <div id="content">

                        <!-- Content -->

                        <section class="12u 12u(narrower)">
                            <h3>Edit Property</h3>
                            <form action="updataProperty.php" method='post'>
                                <div class="row 50%">

                                    <br>Name<br>
                                    <div class="9u 12u(mobilep)">
                                        <input type="text" name="propertyName" id="name" value="<?php echo $row['propertyName']; ?>" placeholder="Name your Property" required/>
                                    </div>

                                </div>

                                <div class="row 50%">
                                    <br>Address<br>

                                    <div class="9u 12u(mobilep)">
                                        <input type="text" name="country" id="name" value="<?php echo $row['country']; ?>" placeholder="Country" required/>
                                    </div>

                                    <div class="9u 12u(mobilep)">
                                        <input type="text" name="address" id="name" value="<?php echo $row['address']; ?>" placeholder="Street address" required/>
                                    </div>

                                    <div class="4u 12u(mobilep)">
                                        <input type="text" name="city" id="name" value="<?php echo $row['city']; ?>" placeholder="City" required/>
                                    </div>

                                    <div class="4u 12u(mobilep)">
                                        <input type="text" name="state" id="name" value="<?php echo $row['state']; ?>" placeholder="State / Province / Region" required/>
                                    </div>

                                    <div class="4u 12u(mobilep)">
                                        <input type="text" name="zipcode" id="name" value="<?php echo $row['zipcode']; ?>" placeholder="Zip Code" required/>
                                    </div>

                                    <div class="9u 12u(mobilep)">
                                        <input type="tel" name="phone"  value="<?php echo $row['phone']; ?>" placeholder="Phone number" required/>
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
                                        <input type="number" name="size" id="name" value="<?php echo $row['size']; ?>" placeholder="Size" required/>
                                    </div>

                                    <div class="10u 12u(mobilep)">
                                        <input type="number" name="bedroom" id="name" value="<?php echo $row['bedroom']; ?>" placeholder="Number of Bedrooms" required/>
                                    </div>

                                    <div class="10u 12u(mobilep)">
                                        <input type="number" name="bathroom" id="name" value="<?php echo $row['bathroom']; ?>" placeholder="Extra Description" rows="5"/>
                                    </div>

                                    <div class="12u">
                                        <textarea type="text" name="extra" id="name" value="<?php echo $row['extra']; ?>" rows="5"></textarea>
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
                                        <input type="number" name="price" id="name" value="<?php echo $row['price']; ?>" placeholder="Price Per Month" required/>

                                    </div>

                                </div>


                                <div class="row 50%">
                                    <br>Availability<br>   



                                    <div class="10u 12u(mobilep)">
                                        <input type="data" name="availability" id="date" value="<?php echo $row['availability']; ?>" placeholder="YYYYMMDD"/>                                            

                                    </div>

                                </div>

                                <div class="row 50%">

                                    <br>Contraction<br>               

                                    <div class="10u 12u(mobilep)">
                                        <input type="data" name="contraction" id="date" value="<?php echo $row['contraction']; ?>" placeholder="YYYY"  />
                                    </div>

                                    <div class="12u">
                                        <textarea type="text" name="problem" id="name" value="<?php echo $row['problem']; ?>" placeholder="Problems if there is any" rows="2"></textarea>
                                    </div>


                                </div>






                                <div class="row 50%">
                                    <div class="12u">
                                        <ul class="actions">
                                            <li><input type="submit" class="button" value="Update" /></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </section>



                        <br><br>

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