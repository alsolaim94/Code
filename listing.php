<?php
    session_start();
    include "MySQL_Functions.php";

    $connection = getMySQLConnection();
    $sql = "SELECT * FROM property WHERE proprtyID = ".$_GET["proprtyID"]." AND address = '".$_GET["address"]."'";
    $results = $connection -> query($sql);

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
                                        echo "<li><a href='logout.php'>Log Out</a></li>";
                                    } else {
                                        echo "<li><a href='loginsignup.html'>Login/Sign Up</a></li>";
                                    }
                                 ?>
							</ul>
						</nav>

				</div>    
			<!-- Main -->
	           <section class="wrapper style1">
					<div class="container">
						<div class="row 200%">
							<div class="8u 12u(narrower)">
								<div id="content">

									<!-- Content -->

										<article>
											<header>
												<h2><?php echo $row['address']; ?></h2>
												<p> <?php echo "$".$row['price']; ?></p>
											</header>
                                            <!-- Need to dynamically add pictures once we know how they will be stored for each property -->
                                            <div style="font-size:14px;">
                                                <span class="image featured">
                                                    <!-- This PHP is commented out. This will be used when we figure out how the images are going to be stored
                                                         Change the query and then change the column name for the $row array
                                                    <?php 
                                                        $images = "";
                                                        $imagesQuery = $connection -> query("SELECT * FROM whatever the table is WHERE however they will be stored");
                                                        if($imagesQuery -> num_rows > 0) {
                                                            while($row = $imagesQuery -> fetch_assoc()) {
                                                                $images .= "<img class='slides' src='" . $row['columnName'] . "' alt='' />";
                                                            }
                                                        } else {
                                                            $images .= "<img class='slides' src'imgaes/noImage.jpg' alt='' />";
                                                        }
                                                        echo $images;
                                                    ?>-->
                                                    <img class="slides" src="images/house.jpg" alt="" />
                                                    <img class="slides" src="images/house2.jpg" alt=""/>
                                                    <img class="slides" src="images/house3.jpg" alt=""/>
                                                    <img class="slides" src="images/house4.jpg" alt=""/>
                                                </span>
                                                <em>Click arrows to cycle through the pictures</em><br>
                                                <button onclick="plusDivs(-1)">&#10094;</button>
                                                <button onclick="plusDivs(1)">&#10095;</button>
                                            </div>
                                            <!-- method used at w3 schools -->
                                            <script>
                                                var slideIndex = 1;
                                                showDivs(slideIndex);

                                                function plusDivs(n) {
                                                  showDivs(slideIndex += n);
                                                }

                                                function showDivs(n) {
                                                  var i;
                                                  var x = document.getElementsByClassName("slides");
                                                  if (n > x.length) {slideIndex = 1}    
                                                  if (n < 1) {slideIndex = x.length}
                                                  for (i = 0; i < x.length; i++) {
                                                     x[i].style.display = "none";  
                                                  }
                                                  x[slideIndex-1].style.display = "block";  
                                                }
                                            </script>

											<h3>Description</h3>
											<p>
                                                <?php 
                                                    if($row['extra'] == "") {
                                                        echo "The seller has not yet entered a description for this property.";
                                                    } else {
                                                        echo $row['extra'];
                                                    }
                                                ?>
                                            </p>
                                            <h3>More Information</h3>
											<p>
                                                <?php
                                                    $finalInfo = "Property Type: " . $row['type'] . "<br>" . 
                                                                 "Price: $" . $row['price'] . " / " . $row['lease'] . "<br>" .
                                                                 "Date Available: " . $row['availability'] . "<br>" .
                                                                 "Contraction: " . $row['contraction'] . "<br>" . 
                                                                 "Problems: " . $row['problem'];
                                                    echo $finalInfo;
                                                ?>
                                            </p>
										</article>
								</div>
							</div>
                            
							<div class="4u 12u(narrower)">
								<div id="sidebar">
									<!-- Sidebar -->
										<section>
											<h3>Location</h3>
											<p>
                                                <?php
                                                    $location = $row['address'] . "<br>".
                                                                $row['city'] .", ".$row['state'] . " " . $row['zipcode'] . "<br>" .
                                                                $row['country'];
                                                    echo $location;
                                                ?>
                                            </p>
										</section>

										<section>
											<h3>Details</h3>
											<p>
                                                <?php 
                                                    $details = "Size: " . $row['size'] . " sqft. <br> " . 
                                                               "Number of Bedrooms: " . $row['bedroom'] . "<br>" . 
                                                               "Number of Bathrooms: " . $row['bathroom'];
                                                    echo $details;
                                                
                                                ?>
                                            </p>
                                            <h3>Contact the Owner</h3>
                                            <p>
                                                <?php
                                                    echo "You May Email the Property Owner Here: <br><a href='mailto:".$row['email']."'>".$row['email']."</a><br><br>
                                                          You May Also Call the Property Owner Here: <br><a href='tel:+1".$row['phone']."'>".$row['phone']."</a>";
                                                ?>
                                            </p>
										</section>
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