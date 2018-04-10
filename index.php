<?php
session_start();
?>


<!DOCTYPE HTML>
<!--
Arcana by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Akari</title>
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
                        <li class="current"><a href="index.php">Home</a></li>
                        <li><a href="properties.php">Properties</a></li>
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

            <!-- Banner -->
            <section id="banner">
                <header>
                    <h2>Arcana: <em>A responsive site template freebie by <a href="http://html5up.net">HTML5 UP</a></em></h2>
                    <a href="#" class="button">Learn More</a>
                </header>
            </section>

            <!-- Highlights -->
            <section class="wrapper style1">
                <div class="container">
                    <div class="row 200%">
                        <section class="4u 12u(narrower)">
                            <div class="box highlight">
                                <i class="icon major fa-paper-plane"></i>
                                <h3>Property Posting</h3>
                                <p>Make sure when posting a property that all important information is correct and listed with the property.</p>
                            </div>
                        </section>
                        <section class="4u 12u(narrower)">
                            <div class="box highlight">
                                <i class="icon major fa-pencil"></i>
                                <h3>Signing a Lease</h3>
                                <p>Make sure to read all of the lease before signing to ensure you are renting what you think you're renting.</p>
                            </div>
                        </section>
                        <section class="4u 12u(narrower)">
                            <div class="box highlight">
                                <i class="icon major fa-wrench"></i>
                                <h3>Maintenance</h3>
                                <p>Before repairing anything broken in your rented apartment/home it is important to contact your landlord and ask about maintenance.</p>
                            </div>
                        </section>
                    </div>
                </div>
            </section>

            <!-- Gigantic Heading -->
            <section class="wrapper style2">
                <div class="container">
                    <header class="major">
                        <h2>The Best Place to Manage your Properties</h2>
                        <p>If you own a a place that you would like to rent out and want to rent and manage it easily, you've come to the right place.</p>
                    </header>
                </div>
            </section>

            <!-- Posts -->
            <section class="wrapper style1">
                <div class="container">
                    <div class="row">
                        <section class="6u 12u(narrower)">
                            <div class="box post">
                                <a href="#" class="image left"><img src="images/pic01.jpg" alt="" /></a>
                                <div class="inner">
                                    <h3>Looking for a place to live?</h3>
                                    <p>Click here to search through our listings.</p>
                                </div>
                            </div>
                        </section>
                        <section class="6u 12u(narrower)">
                            <div class="box post">
                                <a href="#" class="image left"><img src="images/pic02.jpg" alt="" /></a>
                                <div class="inner">
                                    <h3>Looking to post a property?</h3>
                                    <p>Click here to post your property for everyone to see.</p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="row">
                        <section class="6u 12u(narrower)">
                            <div class="box post">
                                <a href="#" class="image left"><img src="images/pic03.jpg" alt="" /></a>
                                <div class="inner">
                                    <h3>Follow our social media</h3>
                                    <p>Click here to visit our social medias page where you can see all of our social media pages!</p>
                                </div>
                            </div>
                        </section>
                        <section class="6u 12u(narrower)">
                            <div class="box post">
                                <a href="#" class="image left"><img src="images/pic04.jpg" alt="" /></a>
                                <div class="inner">
                                    <h3>Have any questions for us?</h3>
                                    <p>Click here to visit FAQ or send us a message with any questions or concerns.</p>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>

            <!-- CTA -->
            <section id="cta" class="wrapper style3">
                <div class="container">
                    <header>
                        <h2>Are you ready to continue your quest?</h2>
                        <a href="#" class="button">Insert Coin</a>
                    </header>
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