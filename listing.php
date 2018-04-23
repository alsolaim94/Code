<?php
session_start();
include "MySQL_Functions.php";

$connection = getMySQLConnection();
$sql = "SELECT * FROM property WHERE propertyID = ".$_GET["propertyID"];
$results = $connection -> query($sql);

// array that holds query results
$row = $results -> fetch_assoc();

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Search Properties</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="assets/js/notification.js"></script>

        
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
                                            <?php
                                                $propertyid = $row['propertyID'];
                                                $userID = $row['userID'];
                                                $folder = "uploads/".$userID."/".$propertyid."/";

                                                $pics = scandir($folder);
                                                $imgHTML = "";

                                                if(sizeof($pics) == 2) {
                                                   $imgHTML .= "<img class='slides' src='images/noImage.jpg' alt='' />";
                                                } else {
                                                    for ($i = 2; $i < sizeof($pics); $i++) {
                                                        $image = $folder . $pics[$i];
                                                        $imgHTML .= "<img class='slides' src='" . $image . "' alt='' />";
                                                    }
                                                }

                                                echo $imgHTML;

                                            ?>
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
                                            "Construction: " . $row['construction'] . "<br>" .
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
                                </section>
                                <section>
                                    <h3>Contact the Owner</h3>
                                    <?php
                                    //if the user is logged in, give contact. If not, prompt to log in
                                    if(!isset($_SESSION['logged_in'])) {
                                        echo "<p>You Must Be Logged In to Contact the Property Owner<br></p>".
                                            "<footer>
                                        <a href='loginsignup.html' class='button'>Log In</a>
                                    </footer>";
                                    }
                                    //if the user view his own property 
                                    else if($row['userID'] == $_SESSION['id']) {
                                        echo "<p>You own this Property<br></p>";  
                                    }
                                    else {
                                        $notiForm = "
                                            <form method='post' id='comment_form'>
                                                <div class='form-group'>
                                                    <label>Enter Subject</label>
                                                    <input type='text' name='subject' id='subject' class='form-control'>
                                                </div>
                                                <div class='form-group'>
                                                    <label>Enter Comment</label>
                                                    <textarea name='comment' id='comment' class='form-control' rows='5'></textarea>
                                                    <input type='hidden' name = 'toID' value='".$row['userID']."'>
                                                    <input type='hidden' name = 'property' value='".$row['propertyID']."'>
                                                </div>
                                                <div class='form-group'>
                                                    <input type='submit' name='post' id='post' class='btn btn-info' value='Send' />
                                                </div>
                                            </form>";
                                        echo $notiForm;
                                    }
                                    ?>
                                    <br><b><p id='notiSuccess' style='color: rgb(70, 193, 249);'></p></b>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Footer -->
                     <?php include 'bottom.html';?>
        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>

    </body>
</html>
