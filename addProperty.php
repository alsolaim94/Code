<?php
session_start();
include 'MySQL_Functions.php';

// Check if user is logged in using the session variable
/*if ( $_SESSION['logged_in'] != 1 ) {
    echo "You must log in before viewing your profile page!";
    header("location: loginsignup.html");    
}*/

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
                            <div class="row 50%">
                                <br>Add an Image<br>

                                <div class="10u 12u(mobilep)">

                                   		<form method="post" enctype="multipart/form-data">
								Select images to upload:
								<input name="files[]" type="file" multiple>
								<input type="submit" value="Upload Images" name="submit">
							</form>
						<?php
							$files;
							$total;
							$name;
							$size;
							$type;
							$tmp_name;
							$userID="userID";
							$propertyid="propertyid";
							$uploaded = 0;
							// Loop through each file
							if(isset($_FILES["files"]["name"])){
								$files = array_filter($_FILES['files']['name']);
								$total = count($_FILES['files']['name']);

								for($i=0; $i<$total; $i++) {
								$name = $_FILES ['files']['name'][$i];
								$size = $_FILES ['files']['size'][$i];
								$type = $_FILES ['files']['type'][$i];
								$tmp_name = $_FILES ['files']['tmp_name'][$i];
								if(!empty($name)&&$size<300000){
									//check if files exist and upload it to the proper file
									if(!file_exists("uploads/".$userID)){
										$folder = "uploads/".$userID."/".$propertyid."/";
										mkdir ("uploads/".$userID);
										mkdir ( "uploads/".$userID."/".$propertyid);
									}
									else if( !file_exists( "uploads/".$userID."/".$propertyid)){
										mkdir ( "uploads/".$userID."/".$propertyid);
										$folder = "uploads/".$userID."/".$propertyid."/";
									}
									else{
										$folder = "uploads/".$userID."/".$propertyid."/";
									}
								  }
								
								
								if(move_uploaded_file($tmp_name, $folder.$name)){
									$uploaded= 1;
								}
								else{
									echo 'There was an error uploading your image';
								 }
								}
								
								}
								
								else{
									echo 'Please select an image';
								}
								if($uploaded == 1){
									echo 'Your files were uploaded';
									
								}

								
							  
							
							?>

                                </div>


                            </div>

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