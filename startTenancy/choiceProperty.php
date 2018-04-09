<?php

session_start();
include '../MySQL_Functions.php';

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  echo "You must log in before viewing your profile page!";
  header("location: ../loginsignup.html");    
}
else {
    
    $connection = getMySQLConnection();
    $sql = "SELECT * FROM users WHERE email = ".$_GET["email"];
    $results = $connection -> query($sql);

    $renterEmail = $_GET["email"];
    $_SESSION['renterEmail'] = $renterEmail;


    // array that holds query results
//    $row = $results -> fetch_assoc();
    
    
    
    $email = $_SESSION['email'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $active = $_SESSION['active'];
    $id = $_SESSION['id'];
}

echo $renterEmail;
echo "  ";
echo $_SESSION['renterEmail'];
echo "  ";
echo $_SESSION['email'];
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
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Logo -->
						<h1><a href="../index.php" id="logo">Akari</a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="../index.php">Home</a></li>
								<li><a href="../properties.php">Properties</a></li>
                                <li class="current"><a href="../profile.php">Profile</a></li>
								<li><a href="../logout.php">Log Out</a></li>
							</ul>
						</nav>

				</div>

			<!-- Main -->
				<section class="wrapper style1">
					<div class="container">
						<div id="content">

							<!-- Content -->

								


                            
                            							<!-- Content -->
						
								<div id="content">

								
                                    
                                    
                                    <!-- Content -->

											<section class="wrapper style1">
                                                



                                                										<header>
                                                                                            
                                               <h2>Second step: Choice the Property you want to rent</h2>                                           




                                                                                            <br>
                                                                                     
                                                                                            
											</header>
  

                                                
                                                 <!-- PHP to generate the viewing of properties posted-->
                                        <?php
                                            
                                            $connection = getMySQLConnection();
                                            $sql = "SELECT * FROM property WHERE email = '$email'";
                                            $propertyInfo = $connection -> query($sql);
                                            $propertyList = "
                                                        
                                                            <div class='container'>
                                                                <div class='row'>";
                                            if($propertyInfo -> num_rows > 0) {
                                                while($row = $propertyInfo -> fetch_assoc()) {
                                                    $propertyList .= "
                                                                <section class='6u 12u(narrower)'>
                                                       <!--              <div class='box post'> -->
                                                                    
                                                                    
 <a href='startTenancy.php?propertyID=".$row['propertyID']."' class='image left'><img src='../images/house.jpg' alt='' /></a>
                                                               
            
                <a href='../editProperties.php?propertyID=".$row['propertyID']."'class='button alt' >Edit </a>
                                                                        
                                                                        <div class='inner'>
                                                                            <strong>$".$row['price'] . "</strong></br>
                                                                            ".$row['bedroom']." Bedrooms</br>
                                                                            ".$row['address']."</br>
                                                                            ".$row['city'].", ".$row['state']." ".$row['zipcode']."</br>
                                                                            
                                                                            </section>
                                                                        </div>
                                                                    </div>
                                                                ";
                                                            
                                                }

                                            } else {
                                                $propertyList .= "
                                            <h3 style='color:red;'>There are no properties to be seen</h3>
                                                ";
                                            }
                                            // show the generated list
                                            echo $propertyList;
                                            echo '<a href="../addProperty.php" class="button">Add New Property</a>';
                                            
                                                
                                        ?>


                                                
                                            </section>
							

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