<?php
    session_start();
    include "../MySQL_Functions.php";
$connection = getMySQLConnection();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  echo "You must log in before viewing your profile page!";
  header("location: ../loginsignup.html");    
}
elseif(isset($_POST["emailOfRenter"])) {
                            $emailOfRenter = mysqli_real_escape_string($connection, $_POST['emailOfRenter']);
                            $userExists = $connection -> query("SELECT * FROM users WHERE email = '$emailOfRenter'");
                            
                            // if the user does not exists
                            if($userExists -> num_rows === 0) {
                                echo "   <script>
                                                    alert('ATTENTION : Wrong Email Address');
                                                    window.location.href='chooseRenter.php';
                                                 </script>";
                            } else{
    $propertyID = mysqli_real_escape_string($connection, $_POST['propertyID']);
    $dataOfTenancy = $_POST['dataOfTenancy'];
                                

                                
                                
    $userSql = "SELECT * FROM users WHERE email = '$emailOfRenter'";
    $propertySql = "SELECT * FROM property WHERE propertyID = '$propertyID'";
                                
    $userResults = $connection -> query($userSql);
    $propertyResults = $connection -> query($propertySql);
                                
    $renter = $userResults -> fetch_assoc();
    $property = $propertyResults -> fetch_assoc(); 
                                

                                

}} 

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
						




                            


			<div >
                

                        
                        
	<p style="line-height:34.1pt;font-size:24.0pt;line-height:36.0pt;font-family:Times;text-align:Center;margin-top:-0.1pt;" class="documentTitle"><span style="font-style:normal;font-weight:bold;">LEASE</span>
	</p>
                        <p >This <b><?php echo $property['type'];?></b> lease (the "Lease") is dated on the <b> <?php  echo $dataOfTenancy; ?></b>, and is between<b> <?php  echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?></b> (the "Landlord") and<b> <?php  echo $renter['firstName']." ".$renter['lastName']; ?></b> (the "Tenant").
	</p>
                        
	<p style="line-height:17.0pt;font-size:12.0pt;line-height:18.0pt;font-family:Times;text-align:Left;">The Landlord and Tenant (collectively, the "Parties") agree as follows:
	</p>
	<ol start="1" style="line-height:17.0pt;font-size:12.0pt;line-height:18.0pt;font-family:Times;margin-top:10.0pt;list-style:decimal inside;">
		<li  value="1">
			<div ><span style="font-style:normal;font-weight:bold;">Property. </span>The Landlord shall rent the house at 
                <b> <?php  echo $property['address'].", ".$property['city'].", ".$property['state']." Zip Code ".$property['zipcode']; ?></b>(the "Property") to the Tenant. The Tenant shall not use the Property in any way other than as a private single-family residence.<br>
			</div>
		</li>
		<li  value="2">
			<div ><span style="font-style:normal;font-weight:bold;">Guests. </span>No guest shall stay in the Property for longer than one week without the prior written permission of the Landlord.<br>
			</div>
		</li>
		<li  value="3">
			<div ><span style="font-style:normal;font-weight:bold;">Animals. </span>The Tenant shall not keep any pets or animals on the Property without the prior written permission of the Landlord.<br>
			</div>
		</li>
		<li  value="4">
			<div ><span style="font-style:normal;font-weight:bold;">Parking. </span>The Tenant may park their vehicles on or about the Property.<br>
			</div>
		</li>
		<li  value="5">
			<div ><span style="font-style:normal;font-weight:bold;">Smoking. </span>The Tenant’s family, employees, visitors, guests and occupants (collectively, the “Tenant's Visitors”) and the Tenant shall not smoke anywhere in or around the Property.<br>
			</div>
		</li>
		<li  value="6">
			<div ><span style="font-style:normal;font-weight:bold;">Term. </span>The Lease begins at 12:00 noon on April 7, 2018 and lasts until 12:00 noon on April 7, 2018 (that period, the "Term").<br>
			</div>
		</li>
		<li  value="7">
            <div ><span style="font-style:normal;font-weight:bold;">Rent Amount. </span>The rent for the Property is <b> <?php  echo "$".$property['price'];?></b> per month (the "Rent") plus any other amount payable by the Tenant to the Landlord under this Lease. These additional amounts will be deemed to be additional rent and the Landlord may recover these additional amounts as rental arrears.<br>
			</div>
		</li>
		<li  value="8">
            <div ><span style="font-style:normal;font-weight:bold;">Rent Payment. </span>The Tenant shall pay the Rent by <b>Paypal</b> on or before the 5th of each and every month of the Term to the Landlord at payment page on the renter profile. The Landlord can not provide any different location for the payment of the Rent.<br>
			</div>
		</li>
		<li value="9">
			<div ><span style="font-style:normal;font-weight:bold;">Tenant Improvements. </span>If the Tenant obtains prior written permission from the Landlord, the Tenant may do any one or more of the following improvements:<br>
				<ol start="1" style="margin-left:9.0pt;margin-top:1.0pt;list-style:lower-alpha inside;">
					<li  value="1">
						<div >applying adhesive materials, or inserting nails or hooks in walls or ceilings other than two small picture hooks per wall;<br>
						</div>
					</li>
					<li  value="2">
						<div >painting, wallpapering or in any way significantly altering the appearance of the Property;<br>
						</div>
					</li>
					<li  value="3">
						<div >removing or adding walls, or performing any other structural alterations;<br>
						</div>
					</li>
					<li  value="4">
						<div >installing one or more waterbeds;<br>
						</div>
					</li>
					<li  value="5">
						<div >adding or changing any electrical wiring;<br>
						</div>
					</li>
					<li  value="6">
						<div >installing additional heating or air conditioning units;<br>
						</div>
					</li>
					<li  value="7">
						<div >changing the amount of heat or power normally used on the Property;<br>
						</div>
					</li>
					<li  value="8">
						<div >displaying, or allowing to be displayed, any notice or sign for any purpose anywhere inside or outside the Property; and<br>
						</div>
					</li>
					<li style="margin-bottom:0.0pt;" value="9">
						<div >adding or changing any satellite, radio or TV antenna or tower on the Property.<br>
						</div>
					</li>
				</ol>
			</div>
		</li>
		<li  value="10">
			<div ><span style="font-style:normal;font-weight:bold;">Insurance. </span>The Tenant acknowledges that the Tenant's personal property is not insured by the Landlord with any insurance and that the Landlord has no liability in regard to the Tenant’s personal property. The Tenant shall insure the Tenant's personal property for the Tenant's own benefit.<br>
			</div>
		</li>
		
        
        
	</ol><div class="keepTogether">
	<p style="line-height:17.0pt;font-size:12.0pt;line-height:18.0pt;font-family:Times;text-align:Left;margin-top:23.0pt;">The Parties are signing this Lease on <?php echo $dataOfTenancy; ?>.
	</p><div>
	<table style="line-height:17.0pt;margin-left:auto;margin-right:auto;margin-top:23.0pt;width:100%;border-collapse:separate;border-spacing:0pt;"><tr>
			<td style="text-align:Right;vertical-align:Bottom;padding:16.0pt;width:50%;">&nbsp;
			</td>
			<td style="text-align:Left;vertical-align:Bottom;padding:16.0pt;width:50%;">
				<p style="font-size:12.0pt;line-height:18.0pt;font-family:Times;text-align:Left;">_______________________________<br>______________________(Landlord)<br>
				</p>
			</td>
		</tr>
		<tr>
			<td style="text-align:Right;vertical-align:Bottom;padding:16.0pt;width:50%;">&nbsp;
			</td>
			<td style="text-align:Left;vertical-align:Bottom;padding:16.0pt;width:50%;">
				<p style="font-size:12.0pt;line-height:18.0pt;font-family:Times;text-align:Left;">_______________________________<br>______________________(Tenant)<br>
				</p>
			</td>
		</tr>
	</table></div>
                        
</div>
                        
                        </div>
                        	
				
                        <button class="button" onclick="myFunction()">Print this Lease</button>
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
        <script>
        function myFunction() {
            window.print();
        }
</script>

	</body>
</html>