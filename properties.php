<?php
session_start();
include "MySQL_Functions.php";
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="assets/js/flag.js"></script>
        <script src="assets/js/filters.js"></script>

        <style>
            #submitFilter, #resetFilter{
                width: 5em;
                height: 2em;
                margin-top: 8px;
            }
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none; 
                margin: 0; 
            }
            
            .flag:hover {
                cursor: pointer;
            }
        </style>
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
                                echo "<a href='logout.php'>Log Out</a>";
                            } else {
                                echo "<a href='loginsignup.html'>Login/Sign Up</a>";
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
                        <div class="8u  12u(narrower) important(narrower)">
                            <div id="content">

                                <!-- Content -->
                                <article id = "propertyArticle">
                                    <header>
                                        <h2>Search Through Listed Properites</h2>
                                        <div id = "inputContainer">
                                            Min Price:
                                            <input type="number" name="minPrice" style= "width: 10%;" value="" id="minPrice">
                                            Max Price:
                                            <input type="number" name="maxPrice" style= "width: 10%;" value="" id="maxPrice">
                                            <br>
                                            <input type="submit" name="submitFilter" value="Filter" id = "submitFilter">
                                            <input type="submit" name="resetFilter" value = "Reset" id = "resetFilter">
                                        </div>
                                    </header>
                                    <div id = "propertyContainer">
                                    <!-- PHP to generate the viewing of properties posted-->
                                    <?php
                                    $connection = getMySQLConnection();
                                    $sql = "SELECT * FROM property";
                                    $propertyInfo = $connection -> query($sql);
                                    $propertyList = "
                                                      <section class='wrapper style1'>
                                                          <div class='container'>
                                                              <div class='row'>";
                                    if($propertyInfo -> num_rows > 0) {
                                        while($row = $propertyInfo -> fetch_assoc()) {
                                            $userID = $row['userID'];
                                            $propertyID = $row['propertyID'];
                                            $directory = "uploads/".$userID."/".$propertyID."/";
                                            $pictures = scandir($directory);

                                            if(sizeof($pictures) == 2) {
                                                $html = "<img src='images/noImage.jpg' alt='' />";
                                            } else {
                                                $path = $directory . $pictures[2];
                                                $html = "<img src='" . $path . "' alt='' />";
                                            }

                                            $propertyList .= "
                                                              <section class='6u 12u(narrower)'>
                                                                  <div class='box post'>
                                                                      <a href='listing.php?address=".$row['address']."&propertyID=".$row['propertyID']."' class='image left'>".$html."</a>
                                                                      <div class='right' style='float: right;'>
                                                                        <span class='flag' value=".$row['propertyID']."><img src='images/flag.png' alt='Flag'></span>
                                                                      </div>
                                                                      <div class='inner' style = 'float: left; margin-left: 5%;'>
                                                                          <strong>$".$row['price'] . "</strong></br>
                                                                          ".$row['bedroom']." Bedrooms</br>
                                                                          ".$row['address']."</br>
                                                                          ".$row['city'].", ".$row['state']." ".$row['zipcode']."</br>
                                                                      </div>
                                                                      
                                                                  </div>
                                                              </section>";

                                        }
                                        $propertyList .= "
                                                      </div>
                                                  </div>
                                              </section>";
                                    } else {
                                        $propertyList .= "
                                              <section class='wrapper style1'>
                                                  <div class='container'>
                                                      <div class='row'>
                                                          <section class='6u 12u(narrower)'>
                                                              <div class='box post'>
                                                                  <div class ='inner'>
                                                                      <h3>There are no properties to be seen</h3>
                                                                   </div>
                                                              </div>
                                                          </section>
                                                      </div>
                                                  </div>
                                              </section>";
                                    }
                                    // show the generated list
                                    echo $propertyList;
                                    ?>
                                    </div>
                                </article>
                            </div>
                        </div>

                    </div>
                </div>
            </section>





            <!-- Footer -->
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <section class="3u 6u(narrower) 12u$(mobilep)">
                             <h3>Featured Locations</h3>
                            <ul class="links">
                                <li><a href="#">Bowling Green, KY</a></li>
                                <li><a href="#">Lexington, KY</a></li>
                                <li><a href="#">Frankfort, KY</a></li>
                                <li><a href="#">Louisville, KY</a></li>
                                <li><a href="#">Nashville, TN</a></li>
                                <li><a href="#">Knoxville, TN</a></li>
                                <li><a href="#">Memphis, TN</a></li>
                            </ul>
                        </section>
                        <section class="3u 6u$(narrower) 12u$(mobilep)">
                            <h3>About Us</h3>
                            <ul class="links">
                                <li><a href="#">Who We Are</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Privacy Statement</a></li>
                                <li><a href="#">Avoiding Scams</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Social Media</a></li>
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
