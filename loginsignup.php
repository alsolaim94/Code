<?php

// doesnt allow user to type this page in address bar
if(!isset($_SERVER['HTTP_REFERER'])) {
    header("Location: profile.php");
    exit;
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
                                            <p>Lorem ipsum dolor sit amet, veniam numquam has te. No suas nonumes recusabo mea, est ut graeci definitiones. His ne melius vituperata scriptorem, cum paulo copiosae conclusionemque at. Facer inermis ius in, ad brute nominati referrentur vis. Dicat erant sit ex. Phaedrum imperdiet scribentur vix no, ad latine similique forensibus vel.</p>
                                            <p>Dolore populo vivendum vis eu, mei quaestio liberavisse ex. Electram necessitatibus ut vel, quo at probatus oportere, molestie conclusionemque pri cu. Brute augue tincidunt vim id, ne munere fierent rationibus mei. Ut pro volutpat praesent qualisque, an iisque scripta intellegebat eam.</p>
                                            <p>Mea ea nonumy labores lobortis, duo quaestio antiopam inimicus et. Ea natum solet iisque quo, prodesset mnesarchum ne vim. Sonet detraxit temporibus no has. Omnium blandit in vim, mea at omnium oblique.</p>
                                            <p>Eum ea quidam oportere imperdiet, facer oportere vituperatoribus eu vix, mea ei iisque legendos hendrerit. Blandit comprehensam eu his, ad eros veniam ridens eum. Id odio lobortis elaboraret pro. Vix te fabulas partiendo.</p>
                                            <p>Natum oportere et qui, vis graeco tincidunt instructior an, autem elitr noster per et. Mea eu mundi qualisque. Quo nemore nusquam vituperata et, mea ut abhorreant deseruisse, cu nostrud postulant dissentias qui. Postea tincidunt vel eu.</p>
                                            <p>Ad eos alia inermis nominavi, eum nibh docendi definitionem no. Ius eu stet mucius nonumes, no mea facilis philosophia necessitatibus. Te eam vidit iisque legendos, vero meliore deserunt ius ea. An qui inimicus inciderint.</p>
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