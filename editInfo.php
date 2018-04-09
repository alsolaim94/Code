<?php
session_start();
include "MySQL_Functions.php";
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
    echo "You must log in before viewing your profile page!";
    header("location: loginsignup.html");    
}

else {
    $connection = getMySQLConnection();
    $sql = "SELECT * FROM users WHERE id = ".$_GET["id"];
    $results = $connection -> query($sql);

    $id = $_GET["id"];
    $_SESSION['id'] = $id;


    // array that holds query results
    $row = $results -> fetch_assoc();
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
                    <div id="content">

                        <!-- Content -->



                        <section class="12u 12u(narrower)">
                            <h3>Edit Info</h3>
                            <form action="updataInfo.php" method='post'>

                                <div class="row 50%">
                                    <div class="9u 12u(mobilep)">
                                        <br>First Name<br>
                                        <input type="text" name="firstName" id="name" value="<?php echo $row['firstName']; ?>" placeholder="first Name" required/>
                                    </div>

                                </div>


                                <div class="row 50%">

                                    <div class="9u 12u(mobilep)">
                                        <br>Last Name<br>
                                        <input type="text" name="lastName" id="name" value="<?php echo $row['lastName']; ?>" placeholder="last Name" required/>
                                    </div>

                                </div>



                                <div class="row 50%">

                                    <div class="9u 12u(mobilep)">
                                        //property would not change the email
                                        <br>Email<br>
                                        <input type="text" name="email" id="name" value="<?php echo $row['email']; ?>" placeholder="email" required/>
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