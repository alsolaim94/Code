<?php
    session_start();
    include "../MySQL_Functions.php";
$connection = getMySQLConnection();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  echo "You must log in before viewing your profile page!";
  header("location: ../loginsignup.html");    
}
else{
    $propertyID = mysqli_real_escape_string($connection, $_POST['propertyID']);
    $emailOfRenter = mysqli_real_escape_string($connection, $_POST['emailOfRenter']);
    $dataOfTenancy = mysqli_real_escape_string($connection, $_POST['dataOfTenancy']);

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
						

							<!-- Content -->
                        
                        
                        <?php  
                        echo "the id is".$propertyID;
                        
                        echo "the email is".$emailOfRenter;
                        echo "the date is".$dataOfTenancy;
                        
                        
                        
                        ?>


                            


			<div >
				<div >
					<h3>
						Your Rental/Lease Agreement
					</h3>
                    
				</div>
                

                
                <div>
					<div>
                        
                        
<!--						<div style="background:url('//www.lawdepot.com/common/images/draft_text.png') repeat-y center top/contain #fff;">-->
	<p style="line-height:34.1pt;font-size:24.0pt;line-height:36.0pt;font-family:Times;text-align:Center;margin-top:-0.1pt;" class="documentTitle"><span style="font-style:normal;font-weight:bold;">RESIDENTIAL LEASE</span>
	</p>
	<p style="line-height:17.0pt;font-size:12.0pt;line-height:18.0pt;font-family:Times;text-align:Left;"><span style="font-style:normal;font-weight:bold;font-size:16.0pt;line-height:24.0pt;">This residential lease (the "Lease") is dated April 7, 2018, and is between </span><span style="font-size:16.0pt;line-height:24.0pt;">_________________________</span><span style="font-size:16.0pt;line-height:24.0pt;"> </span><span style="font-size:16.0pt;line-height:24.0pt;">(the "Landlord") and _________________________</span><span style="font-size:16.0pt;line-height:24.0pt;"> </span><span style="font-size:16.0pt;line-height:24.0pt;">(the "Tenant").</span>
	</p>
	<p style="line-height:17.0pt;font-size:12.0pt;line-height:18.0pt;font-family:Times;text-align:Left;">The Landlord and Tenant (collectively, the "Parties") agree as follows:
	</p>
	<ol start="1" style="line-height:17.0pt;font-size:12.0pt;line-height:18.0pt;font-family:Times;margin-top:10.0pt;list-style:decimal inside;">
		<li  value="1">
			<div ><span style="font-style:normal;font-weight:bold;">Property. </span>The Landlord shall rent the house at ______________________, ______________________, Kentucky &nbsp;__________ (the "Property") to the Tenant. The Tenant shall not use the Property in any way other than as a private single-family residence.<br>
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
			<div ><span style="font-style:normal;font-weight:bold;">Rent Amount. </span>The rent for the Property is $___________ per month (the "Rent") plus any other amount payable by the Tenant to the Landlord under this Lease. These additional amounts will be deemed to be additional rent and the Landlord may recover these additional amounts as rental arrears.<br>
			</div>
		</li>
		<li  value="8">
			<div ><span style="font-style:normal;font-weight:bold;">Rent Payment. </span>The Tenant shall pay the Rent by cash or check on or before the ____________________ of each and every month of the Term to the Landlord at ______________________, ______________, Kentucky __________. The Landlord may provide any different location for the payment of the Rent.<br>
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
		<li  value="11">
			<div ><span style="font-style:normal;font-weight:bold;">Termination for Untenantable Damage. </span>If any part of the Property is damaged other than by the Tenant's negligent or willful act or that of the Tenant's Visitors and the Landlord decides not to rebuild or repair the Property, the Landlord may end this Lease by giving the appropriate notice.<br>
			</div>
		</li>
		<li  value="12">
			<div ><span style="font-style:normal;font-weight:bold;">Condition Upon Return. </span>At the end of the Term, the Tenant shall leave the Property in a condition as good as it was at the start of this Lease subject to reasonable use and wear and tear.<br>
			</div>
		</li>
		<li  value="13">
			<div ><span style="font-style:normal;font-weight:bold;">Notification of Damage. </span>The Tenant shall promptly notify the Landlord of any damage to, or of any situation that may significantly interfere with the normal use of, the Property or to any furnishings supplied by the Landlord.<br>
			</div>
		</li>
		<li  value="14">
			<div ><span style="font-style:normal;font-weight:bold;">Mold. </span>If the Tenant discovers any mold or significant moisture accumulation on the Property, the Tenant will immediately notify the Landlord in writing.<br>
			</div>
		</li>
		<li  value="15">
			<div ><span style="font-style:normal;font-weight:bold;">Trash. </span>The Tenant shall dispose of all trash in an appropriate manner.<br>
			</div>
		</li>
		<li  value="16">
			<div ><span style="font-style:normal;font-weight:bold;">Illegal Activities. </span>The Tenant shall not engage in or permit any illegal activity on or near the Property.<br>
			</div>
		</li>
		<li  value="17">
			<div ><span style="font-style:normal;font-weight:bold;">Standards. </span>The Parties shall comply with all standards required by law.<br>
			</div>
		</li>
		<li  value="18">
			<div ><span style="font-style:normal;font-weight:bold;">Rules. </span>The Tenant shall obey all rules and regulations of the Landlord regarding the Property.<br>
			</div>
		</li>
		<li  value="19">
			<div ><span style="font-style:normal;font-weight:bold;">Absence. </span>If the Tenant is going to be away from the Property for four or more consecutive days, the Tenant will arrange for regular inspection of the Property by a competent person. The Tenant shall provide in advance to the Landlord the contact information of the person doing the inspections.<br>
			</div>
		</li>
		<li  value="20">
			<div ><span style="font-style:normal;font-weight:bold;">Hazardous Materials. </span>The Tenant shall not have on the Property any dangerous, flammable, or explosive objects that the Landlord’s insurance company considers hazardous or unacceptably increases the danger of fire on the Property.<br>
			</div>
		</li>
		<li  value="21">
			<div ><span style="font-style:normal;font-weight:bold;">Notice to Tenant. </span>The Landlord may contact the Tenant at the Property regarding this tenancy. &nbsp;After this Lease has been terminated, the Landlord may contact the Tenant at any other address as the Tenant provides. The Landlord may contact or serve the Tenant at _________________________.<br>
			</div>
		</li>
		<li  value="22">
			<div ><span style="font-style:normal;font-weight:bold;">Notice to Landlord. </span>The Tenant may contact or serve the Landlord at ______________________, ______________, Kentucky __________. The Tenant may contact the Landlord at _________________________.<br>
			</div>
		</li>
		<li  value="23">
			<div ><span style="font-style:normal;font-weight:bold;">Legal Fees. </span>If any proceeding is commenced regarding any dispute under this Lease, the unsuccessful party in that proceeding will pay a reasonable sum to the successful party for legal fees, in addition to all other sums that the unsuccessful party will owe as part of that proceeding.<br>
			</div>
		</li>
		<li  value="24">
			<div ><span style="font-style:normal;font-weight:bold;">Governing Law. </span>The laws of the Commonwealth of Kentucky govern all matters arising out of this Lease and the courts of the Commonwealth of Kentucky have exclusive jurisdiction over those matters.<br>
			</div>
		</li>
		<li  value="25">
			<div ><span style="font-style:normal;font-weight:bold;">Conflict with Act. </span>If there is a conflict between any provision of this Lease and the applicable legislation of the Commonwealth of Kentucky (the "Act"), the Act will prevail and such provisions of this Lease will be amended or deleted as necessary in order to comply with the Act.<br>
			</div>
		</li>
		<li  value="26">
			<div ><span style="font-style:normal;font-weight:bold;">Incorporated by Act. </span>If the Act requires certain provisions in the Lease and any of those provisions are not in this Lease, those missing provisions are incorporated into this Lease.<br>
			</div>
		</li>
		<li  value="27">
			<div ><span style="font-style:normal;font-weight:bold;">Severability. </span>The Parties acknowledge that if a dispute between the Parties arises out of this Lease, the Parties want the court to interpret this Lease as follows:<br>
				<ol start="1" style="margin-left:9.0pt;margin-top:1.0pt;list-style:lower-alpha inside;">
					<li  value="1">
						<div >with respect to any provision that it holds to be unenforceable, by modifying that provision to the minimum extent necessary to make it enforceable or, if that modification is not permitted by law, by disregarding that provision; and<br>
						</div>
					</li>
					<li style="margin-bottom:0.0pt;" value="2">
						<div >if an unenforceable provision is modified or disregarded in accordance with this section, by holding that the rest of the Lease will remain in effect as written.<br>
						</div>
					</li>
				</ol>
			</div>
		</li>
		<li  value="28">
			<div ><span style="font-style:normal;font-weight:bold;">Assignment. </span>The Tenant shall not assign this Lease. The Tenant shall not sublet any part of the Property or grant any concession or license to use any part of the Property.<br>
			</div>
		</li>
		<li  value="29">
			<div ><span style="font-style:normal;font-weight:bold;">Amendment. </span>Any amendment or modification of this Lease must be made in writing and signed by each Party, or their authorized representative.<br>
			</div>
		</li>
		<li  value="30">
			<div ><span style="font-style:normal;font-weight:bold;">Currency. </span>All monetary amounts referred to in this Lease are in the United States dollar.<br>
			</div>
		</li>
		<li  value="31">
			<div ><span style="font-style:normal;font-weight:bold;">Waiver. </span>Any waiver by the Landlord of the Tenant’s failure to perform any provision of this Lease is not a waiver of the Landlord's right to subsequently insist on performance or pursue any remedy for that failure.<br>
			</div>
		</li>
		<li  value="32">
			<div ><span style="font-style:normal;font-weight:bold;">Joint and Several. </span>Where there is more than one Tenant, all Tenants are jointly and severally liable for each other Tenant's acts, omissions and liabilities.<br>
			</div>
		</li>
		<li  value="33">
			<div ><span style="font-style:normal;font-weight:bold;">Locks. </span>Other than any changes made according to the Act, locks may not be added or changed without the prior written agreement of both the Landlord and the Tenant.<br>
			</div>
		</li>
		<li  value="34">
			<div ><span style="font-style:normal;font-weight:bold;">Insufficient Funds. </span>The Tenant will pay $__________ to the Landlord for each check returned by the Tenant's financial institution marked as N.S.F.<br>
			</div>
		</li>
		<li style="margin-bottom:0.0pt;" value="35">
			<div ><span style="font-style:normal;font-weight:bold;">Time is of the Essence. </span>Subject to the Act, time is of the essence in regards to the payment of monies under this Lease. If the Tenant fails to pay any monies owed when due under this Lease, the Landlord will have such remedies as provided under the Act.<br>
			</div>
		</li>
	</ol><div class="keepTogether">
	<p style="line-height:17.0pt;font-size:12.0pt;line-height:18.0pt;font-family:Times;text-align:Left;margin-top:23.0pt;">The Parties are signing this Lease on April 7, 2018.
	</p><div>
	<table style="line-height:17.0pt;margin-left:auto;margin-right:auto;margin-top:23.0pt;width:100%;border-collapse:separate;border-spacing:0pt;"><colgroup><col style="width:50%;"><col style="width:50%;">
		</colgroup><tbody><tr>
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
	</tbody></table></div>
	<table style="line-height:16.0pt;margin-right:auto;margin-top:24.0pt;width:100%;border-collapse:separate;border-spacing:0pt;"><colgroup><col style="width:48.97959%;"><col style="width:2.040817%;"><col style="width:48.97959%;">
		</colgroup><tbody><tr>
		</tr>
	</tbody></table></div><div class="keepTogether">
	<p style="line-height:17.0pt;font-size:12.0pt;line-height:18.0pt;font-family:Times;text-align:Left;margin-top:23.0pt;">The Tenant acknowledges receiving a duplicate copy of this Lease signed by the Tenant and the Landlord on ____________________, ______.
	</p><div>
	<table style="line-height:17.0pt;margin-left:auto;margin-right:auto;margin-top:23.0pt;width:100%;border-collapse:separate;border-spacing:0pt;"><colgroup><col style="width:50%;"><col style="width:50%;">
		</colgroup><tbody><tr>
			<td style="text-align:Right;vertical-align:Bottom;padding:16.0pt;width:50%;">&nbsp;
			</td>
			<td style="text-align:Left;vertical-align:Bottom;padding:16.0pt;width:50%;">
				<p style="font-size:12.0pt;line-height:18.0pt;font-family:Times;text-align:Left;">_______________________________<br>______________________(Tenant)<br>
				</p>
			</td>
		</tr>
	</tbody></table></div></div></div>
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