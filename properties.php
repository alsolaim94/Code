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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="assets/js/flag.js"></script>
        <script src="assets/js/filters.js"></script>
        <link rel="stylesheet" href="assets/css/properties.css"/>

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
                                echo "<a class='logoutButton' onclick='logout()'>Log Out</a>";
                            } else {
                                echo "<a href='loginsignup.php'>Login/Sign Up</a>";
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
                        <div id="propertyContent" class="8u  12u(narrower) important(narrower)">
                            <div id="content">

                                <!-- Content -->
                                <article>
                                    <header>
                                        <h2>Search Through Listed Properites</h2>
                                        <div class = "dropdown">
                                            <button onclick="filterDropdown()" class="dropbtn">Filter</button>
                                            <button onclick="filterDropdown()" class="dropbtn" id = "resetFilter">Reset</button>
                                            <div id = "inputContainer" class = "dropdown-content">
                                                <div class="filterOption">
                                                    <span class="filterLabel">Min Price:</span>
                                                    <input type="number" name="minPrice"  value="" id="minPrice">
                                                </div>
                                                <br>
                                                <div class="filterOption">
                                                    <span class="filterLabel">Max Price:</span>
                                                    <input type="number" name="maxPrice"  value="" id="maxPrice">
                                                </div>
                                                <br>
                                                <div class="filterOption">
                                                    <span class="filterLabel">State:</span>
                                                    <?php echo getStateFilter(); ?>
                                                </div>
                                                <br>
                                                <div class="filterOption">
                                                    <span class="filterLabel">City:</span>
                                                    <?php echo getCitiesFilter(); ?>
                                                </div>
                                                <br>
                                                <div class="filterOption">
                                                    <span class="filterLabel">Type:</span>
                                                    <?php echo getTypeFilter(); ?>
                                                </div>
                                                <br>
                                                <div class="filterOption">
                                                    <span class="filterLabel">Bedrooms:</span>
                                                    <?php echo getBedroomFilter(); ?>
                                                </div>
                                                <br>
                                                <div class="filterOption">
                                                    <span class="filterLabel">Bathrooms:</span>
                                                    <?php echo getBathroomFilter(); ?>
                                                </div>
                                                <br>
                                                <input type="submit" name="submitFilter" value="Filter" id = "submitFilter" class="dropbtn" onclick="filterDropdown()">
                                            </div>
                                        </div>
                                    </header>
                                    <br><br><div class="customHr">.</div>
                                    <div id = "propertyContainer">
                                    <!-- PHP to generate the viewing of properties posted-->
                                    <?php
                                    $connection = getMySQLConnection();
                                    // query database for properties that arent rented
                                    // output to page
                                    $sql = "SELECT * FROM property WHERE rented = 0";
                                    $propertyInfo = $connection -> query($sql);
                                    $propertyList = "
                                                      <section class='wrapper style1'>
                                                          <div class='container'>
                                                              <div class='row'>";
                                    if($propertyInfo -> num_rows > 0) {
                                        while($row = $propertyInfo -> fetch_assoc()) {
                                            $userID = $row['userID'];
                                            $propertyID = $row['propertyID'];
                                            $directory = "uploads/".$userID."/".$propertyID."/";
                                            $pictures = scandir($directory);

                                            if(sizeof($pictures) == 2) {
                                                $html = "<img style='max-height: 6em; width: auto; max-width: 190px;' src='images/noImage.jpg' alt=''/>";
                                            } else {
                                                $path = $directory . $pictures[2];
                                                $html = "<img style='max-height: 6em; width: auto; max-width: 190px;' src='" . $path . "' alt=''/>";
                                            }

                                            $propertyList .= "
                                                              <section class='6u 12u(narrower)'>
                                                                  <div class='box post'>
                                                                      <a href='listing.php?address=".$row['address']."&propertyID=".$row['propertyID']."' class='image left'>".$html."</a>
                                                                      <div class='right' style='float: right;'>
                                                                        <span class='flag' value=".$row['propertyID']."><img src='images/flag.png' alt='Flag'></span>
                                                                      </div>
                                                                      <div class='inner' style = 'float: left; margin-left:3em;'>
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
                                    </div>
                                </article>
                            </div>
                        </div>

                    </div>
                </div>
            </section>





            <!-- Footer -->
                     <?php
                        include 'bottom.html';
                        $connection -> close();
                    ?>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
        <script>
            /* When the user clicks on the button,
            toggle between hiding and showing the dropdown content */
            function filterDropdown() {
                document.getElementById("inputContainer").classList.toggle("show");
            }


        </script>

    </body>
</html>
