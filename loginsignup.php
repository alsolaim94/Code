<?php

// doesnt allow user to type this page in address bar
if(!isset($_SERVER['HTTP_REFERER'])) {
    header("Location: index.php");
    exit();
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
        <title>Log In or Sign Up</title>
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
                        <li><a href="properties.php">Properties</a></li>
                        <li class="current"><a href="loginsignup.php">Login/Sign Up</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Main -->

            <section class="wrapper style1">
                <div class="container">
                    <div id="content">

                        <!-- Content -->

                        <section class="6u 12u(narrower)">
                            <h3>Log In</h3>
                            <form action='login.php' method='post'>
                                <div class="row 50%">
                                    <div class="6u 12u(mobilep)">
                                        <input type="email" name="email" id="name" placeholder="Email" />
                                    </div>
                                    <div class="6u 12u(mobilep)">
                                        <input type="password" name="password" id="email" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row 50%">
                                    <div class="12u">
                                        <ul class="actions">
                                            <li><input type="submit" class="button" value="Log In" /></li>
                                        </ul>
                                    </div>
                                    <div class="12u">
                                        <a href="forgot.php"> Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                        </section>
                        <br><br>

                        <section class="6u 12u(narrower)">
                            <h3>Create a New Account</h3>
                            <form action='register.php' method='post' onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
                                <div class="row 50%">
                                    <div class="6u 12u(mobilep)">
                                        <input type="text" name="firstName" id="name" placeholder="First Name" maxlength="15" minlength="2" required/>
                                    </div>
                                    <div class="6u 12u(mobilep)">
                                        <input type="text" name="lastName" id="email" placeholder="Last Name" maxlength="15" minlength="2"  required/>
                                    </div>
                                    <br>
                                    <div class="6u 12u(mobilep)">
                                        <input type="email" name="email" id="email" placeholder="Email" maxlength="50" minlength="5" required/>
                                    </div>
                                    <br>
                                    <div class="6u 12u(mobilep)">
                                        <input type="tel" name="phone" id="phone" placeholder="Phone Number" maxlength="15" minlength="6" required/>
                                    </div>
                                    <br>
                                    <div class="6u 12u(mobilep)">
                                        <input type="password" name="password" id="password" placeholder="Password" maxlength="20" minlength="5" required/>
                                    </div>
                                    <div class="6u 12u(mobilep)">
                                        <input type="password" name="passwordConfirm" id="passConfirm" placeholder="Confirm Password"  maxlength="20" minlength="5" required/>

                                    </div>

                                    <!-- Script to make sure the confirm password is the same as the password -->
                                    <script>
                                        var password = document.getElementById('password')
                                        , confirm_password = document.getElementById('passConfirm');

                                        function validatePassword(){
                                            if(password.value != confirm_password.value) {
                                                confirm_password.setCustomValidity('Passwords Do not Match');
                                            } else {
                                                confirm_password.setCustomValidity('');
                                            }
                                        }
                                        password.onchange = validatePassword;
                                        confirm_password.onkeyup = validatePassword;
                                    </script>

                                </div>

                                <div class="form-group">
                                    <label class="col-xs-3 control-label">Terms of use</label>
                                    <div class="col-xs-9">
                                        <div style="border: 1px solid #e5e5e5; height: 200px; overflow: auto; padding: 10px;">
                                        
											<h2>
												Web Site Terms and Conditions of Use
											</h2>

											<h3>
												1. Terms
											</h3>

											<p>
												By accessing this web site, you are agreeing to be bound by these 
												web site Terms and Conditions of Use, all applicable laws and regulations, 
												and agree that you are responsible for compliance with any applicable local 
												laws. If you do not agree with any of these terms, you are prohibited from 
												using or accessing this site. The materials contained in this web site are 
												protected by applicable copyright and trade mark law.
											</p>

											<h3>
												2. Use License
											</h3>

											<ol type="a">
												<li>
													Permission is granted to temporarily download one copy of the materials 
													(information or software) on Akari's web site for personal, 
													non-commercial transitory viewing only. This is the grant of a license, 
													not a transfer of title, and under this license you may not:
													
													<ol type="i">
														<li>modify or copy the materials;</li>
														<li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
														<li>attempt to decompile or reverse engineer any software contained on Akari's web site;</li>
														<li>remove any copyright or other proprietary notations from the materials; or</li>
														<li>transfer the materials to another person or "mirror" the materials on any other server.</li>
													</ol>
												</li>
												<li>
													This license shall automatically terminate if you violate any of these restrictions and may be terminated by Akari at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.
												</li>
											</ol>

											<h3>
												3. Disclaimer
											</h3>

											<ol type="a">
												<li>
													The materials on Akari's web site are provided "as is". Akari makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, Akari does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.
												</li>
											</ol>

											<h3>
												4. Limitations
											</h3>

											<p>
												In no event shall Akari or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on Akari's Internet site, even if Akari or a Akari authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.
											</p>
														
											<h3>
												5. Revisions and Errata
											</h3>

											<p>
												The materials appearing on Akari's web site could include technical, typographical, or photographic errors. Akari does not warrant that any of the materials on its web site are accurate, complete, or current. Akari may make changes to the materials contained on its web site at any time without notice. Akari does not, however, make any commitment to update the materials.
											</p>

											<h3>
												6. Links
											</h3>

											<p>
												Akari has not reviewed all of the sites linked to its Internet web site and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by Akari of the site. Use of any such linked web site is at the user's own risk.
											</p>

											<h3>
												7. Site Terms of Use Modifications
											</h3>

											<p>
												Akari may revise these terms of use for its web site at any time without notice. By using this web site you are agreeing to be bound by the then current version of these Terms and Conditions of Use.
											</p>

											<h3>
												8. Governing Law
											</h3>

											<p>
												Any claim relating to Akari's web site shall be governed by the laws of the State of Kentucky without regard to its conflict of law provisions.
											</p>

											<p>
												General Terms and Conditions applicable to Use of a Web Site.
											</p>



											<h2>
												Privacy Policy
											</h2>

											<p>
												Your privacy is very important to us. Accordingly, we have developed this Policy in order for you to understand how we collect, use, communicate and disclose and make use of personal information. The following outlines our privacy policy.
											</p>

											<ul>
												<li>
													Before or at the time of collecting personal information, we will identify the purposes for which information is being collected.
												</li>
												<li>
													We will collect and use of personal information solely with the objective of fulfilling those purposes specified by us and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.		
												</li>
												<li>
													We will only retain personal information as long as necessary for the fulfillment of those purposes. 
												</li>
												<li>
													We will collect personal information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned. 
												</li>
												<li>
													Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and up-to-date. 
												</li>
												<li>
													We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.
												</li>
												<li>
													We will make readily available to customers information about our policies and practices relating to the management of personal information. 
												</li>
											</ul>

											<p>
												We are committed to conducting our business in accordance with these principles in order to ensure that the confidentiality of personal information is protected and maintained. 
											</p>		

			
                                        </div>
                                    </div>
                                </div>





                                <div class="row 50%">
                                    <div class="12u">
                                        <ul class="actions">

                                            <li><input type="checkbox" name="checkbox" value="check" id="agree" /></li> Agree with the terms and conditions


                                            <li><input type="submit" class="button" value="Register" /></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </section>

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