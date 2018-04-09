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
<<<<<<< HEAD
                                  <article>
                                      <header>
                                          <h2>Search Through Listed Properites</h2>
                                          <form action="#" method="get" id="filterForm">
                                              <div id = "inputContainer">
                                                  Min Price:
                                                  <input type="number" name="minPrice" style= "width: 10%;" value="">
                                                  Max Price:
                                                  <input type="number" name="maxPrice" style= "width: 10%;" value="">
                                                  <br>
                                                  <input type="submit" name="submitFilter" value="Filter" id = "submitFilter">
                                                  <input type="submit" name="resetFilter" value = "Reset" id = "resetFilter">
                                              </div>
                                          </form>
                                      </header>
                                      <!-- PHP to generate the viewing of properties posted-->
                                      <?php
                                          $connection = getMySQLConnection();

                                          if(isset($_GET["submitFilter"])) {
                                              if($_GET["minPrice"] != "") {
                                                  $min = $_GET["minPrice"];
                                              } else {
                                                  $min = 0;
                                              }
                                              
                                              if($_GET["maxPrice"] != "") {
                                                  $max = $_GET["maxPrice"];
                                              } else {
                                                  $max = 100000000;
                                              }
                                              
                                              $sql = "SELECT * FROM property WHERE price >= '$min' AND price <= '$max'";
                                              $propertyInfo = $connection -> query($sql);
                                              
                                          } elseif(isset($_GET["resetFilter"]) || !isset($_GET['resetFilter'])) {
                                              $sql = "SELECT * FROM property";
                                              $propertyInfo = $connection -> query($sql);
                                          }
                                         $propertyList = "
                                                      <section class='wrapper style1'>
                                                          <div class='container'>
                                                              <div class='row'>";
                                          if($propertyInfo -> num_rows > 0) {
                                              while($row = $propertyInfo -> fetch_assoc()) {
                                                  $propertyList .= "
                                                              <section class='6u 12u(narrower)'>
                                                                  <div class='box post'>
                                                                      <a href='listing.php?address=".$row['address']."&propertyID=".$row['propertyID']."' class='image left'><img src='images/house.jpg' alt='' /></a>
                                                                      <div class='inner'>
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
