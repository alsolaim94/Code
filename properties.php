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

                                <li>
                                    <!-- if the user is logged in, it will show the profile -->
                                    <?php
                                        if(isset($_SESSION['email'])) {
                                            echo "<a href='profile.php'>Profile</a>";                     
                                        }
                                     ?>
                                </li>
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

				            <section class="12u 12u(narrower)">
								<h3>Adding Your Prooerty</h3>
								<form action='registerProperty.php' method='post' enctype="multipart/form-data">

									<div class="row 50%">
                                        <br>Name<br>
                                        <div class="9u 12u(mobilep)">
                                            <input type="text" name="prooertyName" id="name" placeholder="Name your Property" required/>
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
                                        
                                        <div class="9u 12u(mobilep)">
											<input type="tel" name="phone"  placeholder="Phone number" required/>
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
											<input type="data" name="availability" id="date" placeholder="YYYYMMDD"/>
										</div>
                                    </div>
                                    
                                    <div class="row 50%">
                                        <br>Contraction<br>    
                                        <div class="10u 12u(mobilep)">
                                            <input type="data" name="contraction" id="date" placeholder="YYYY"  />
                                        </div>
                                        <div class="12u">
                                            <textarea type="text" name="problem" id="name" placeholder="Problems if there is any" rows="2"></textarea>
                                        </div>
                                    </div>
                
                                    <div class="row 50%">
                                        <br>Upload A Picture<br>    
                                        <div class="10u 12u(mobilep)">
                                            <input type="file" name="uploadPic" id="date" multiple/>
                                        </div>
                                    </div>
                                    
									<div class="row 50%">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" class="button" value="Register" name="submit"/></li>
											</ul>
<<<<<<< HEAD
										</div>
									</div>
								</form>
							</section>
                            <br><br>
=======
											<footer>
												<a href="#" class="button">More Random Links</a>
											</footer>
										</section>

								</div>
							</div>
							<div class="8u  12u(narrower) important(narrower)">
								<div id="content">

									<!-- Content -->

										<article>
											<header>
												<h2>Search Through Listed Properites</h2>
											     <p>Filter</p>
											</header>

											

											<section class="wrapper style1">
                                                <div class="container">
                                                    <div class="row">
                                                        <section class="6u 12u(narrower)">
                                                            <div class="box post">
                                                                <a href="#" class="image left"><img src="images/house.jpg" alt="" /></a>
                                                                <div class="inner">
                                                                    <h3>Address of the Property</h3>
                                                                    <p>Brief description to let the potential renter know what they are about to click on</p>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                            </section>
										</article>

								</div>
							</div>
>>>>>>> ResetPassword
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