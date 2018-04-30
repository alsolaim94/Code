<?php

session_start();
include 'MySQL_Functions.php';

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
    echo "You must log in before viewing your profile page!";
    header("location: loginsignup.php");
}
else {
    $email = $_SESSION['email'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $active = $_SESSION['active'];
    $id = $_SESSION['id'];
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
        <link rel="stylesheet" href="assets/css/main.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="assets/js/notification.js"></script>
        <style>
            .notiElement {
                border: 4px solid rgb(70, 193, 249);
                border-radius: 25px;
                margin-bottom: 1em; 
                padding: 5px;
                width: 75%;
            }
            .notiElement:hover {
                cursor: pointer;
            }

            .customHr {
                width: 100%;
                font-size: 1px;
                color: rgba(0, 0, 0, 0);
                line-height: 1px;

                background-color: grey;
                margin-top: -6px;
                margin-bottom: 10px;
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
                        <li><a href="properties.php">Properties</a></li>
                        <li class="current"><a href="profile.php">Profile</a></li>
                        <li id="logout"><a class='logoutButton' onclick='logout()'>Log Out</a></li>
                    </ul>
                </nav>

            </div>

            <!-- Main -->
            <section class="wrapper style1">
                <div class="container">
                    <div id="content">

                        <!-- Content -->
                        <header>
                            <h2>
                                <?php
                                echo "Welcome Back " . $firstName . " " . $lastName. "!";
                                ?>
                            </h2>
                            <ul class="actions">
                                <li>
                                    <a href="editInfo.php?id=<?php echo $id; ?>" class="button"> Update Your Info</a>
                                </li>
                                <li>
                                    <a href="addProperty.php" class="button">Add New Property</a>
                                </li>
                                <li>
                                    <a href="payment.php" class="button">Make Payment</a>
                                </li>
                                <li>
                                    <a href="startTenancy/chooseRenter.php" class="button">Make New Tenancy</a>
                                </li>
                            </ul>
                        </header>

                        <!-- Content -->
                        <div class="8u  12u(narrower) important(narrower)">
                            <div id="content">
                                <!-- Content -->

                                <article>
                                    <section class="wrapper style1">
                                        <header>
                                            <u><h2>Owned Properties</h2></u>
                                        </header>
                                        <!-- PHP to generate the viewing of properties posted-->
                                        <h3> Rented </h3>
                                        <?php
                                        $connection = getMySQLConnection();
                                        $sql = "SELECT * FROM property WHERE rented = 1 AND userID = $id";
                                        $propertyInfo = $connection -> query($sql);
                                        $propertyList = "
                                        <div class='container'>
                                            <div class='row'>";
                                        if($propertyInfo -> num_rows > 0) {
                                            while($row = $propertyInfo -> fetch_assoc()) {
                                                $userID = $row['userID'];
                                                $propertyID = $row['propertyID'];

                                                $sql = "SELECT * FROM users WHERE id IN (SELECT renterID FROM rental WHERE propertyID = ".$propertyID.")";
                                                $renterQuery = $connection -> query($sql);
                                                $renterInfo = $renterQuery -> fetch_assoc();

                                                $directory = "uploads/".$userID."/".$propertyID."/";
                                                $pictures = scandir($directory);
                                                if(sizeof($pictures) == 2) {
                                                    $html = "<img src='images/noImage.jpg' style ='max-width: 200px; height: auto;' alt='' />";
                                                } else {
                                                    $path = $directory . $pictures[2];
                                                    $html = "<img src='" . $path . "' style ='max-width: 200px; height: auto;' alt='' />";
                                                }

                                                $propertyList .= "
                                                <section class='6u 12u(narrower)'>
                                                    <a href='listing.php?address=".$row['address']."&propertyID=".$row['propertyID']."' class='image left'>".$html."</a>

                                                    <a href='editProperties.php?address=".$row['address']."&propertyID=".$row['propertyID']."'class='button alt' >Edit </a>

                                                    <div class='inner'>
                                                        <strong>$".$row['price'] . "</strong></br>
                                                        ".$row['address']."</br>
                                                        ".$row['city'].", ".$row['state']." ".$row['zipcode']."</br>
                                                        <u>Rented By</u>: ".$renterInfo['firstName']." ".$renterInfo['lastName']."<br>
                                                    </div>
                                                </section>";

                                            }

                                        } else {
                                            $propertyList .= "
                                            <h4>No properties are currently rented</h4>
                                                ";
                                        }
                                        // show the generated list
                                        echo $propertyList."
                                            </div>
                                        </div>
                                    ";
                                        ;
                                        ?>
                                        <br><br>
                                        <h3>Unrented Properties</h3>
                                        <?php
                                        $connection = getMySQLConnection();
                                        $sql = "SELECT * FROM property WHERE rented = 0 AND userID = $id";
                                        $propertyInfo = $connection -> query($sql);
                                        $propertyList = "
                                        <div class='container'>
                                            <div class='row'>";
                                        if($propertyInfo -> num_rows > 0) {
                                            while($row = $propertyInfo -> fetch_assoc()) {
                                                $userID = $row['userID'];
                                                $propertyID = $row['propertyID'];
                                                $directory = "uploads/".$userID."/".$propertyID."/";
                                                $pictures = scandir($directory);
                                                if(sizeof($pictures) == 2) {
                                                    $html = "<img src='images/noImage.jpg' style ='max-width: 200px; height: auto;' alt='' />";
                                                } else {
                                                    $path = $directory . $pictures[2];
                                                    $html = "<img src='" . $path . "' style ='max-width: 200px; height: auto;' alt='' />";
                                                }

                                                $propertyList .= "
                                                <section class='6u 12u(narrower)'>
                                                    <a href='listing.php?address=".$row['address']."&propertyID=".$row['propertyID']."' class='image left'>".$html."</a>

                                                    <a href='editProperties.php?address=".$row['address']."&propertyID=".$row['propertyID']."'class='button alt' >Edit </a>

                                                    <div class='inner'>
                                                        <strong>$".$row['price'] . "</strong></br>
                                                        ".$row['bedroom']." Bedrooms</br>
                                                        ".$row['address']."</br>
                                                        ".$row['city'].", ".$row['state']." ".$row['zipcode']."</br>
                                                    </div>
                                                </section>";

                                            }

                                        } else {
                                            $propertyList .= "
                                            <h4>No properties are waiting to be rented</h4>
                                                ";
                                        }
                                        // show the generated list
                                        echo $propertyList."
                                            </div>
                                        </div>
                                    ";
                                        ;
                                        ?>
                                    </section>
                                    <div class="customHr">.</div>
                                    <section class="wrapper style1">
                                        <header>
                                            <u><h2>Rented Properties</h2></u>
                                        </header>
                                        <!-- PHP to generate the viewing of properties posted-->
                                        <?php
                                        $connection = getMySQLConnection();
                                        $sql = "SELECT * FROM property WHERE rented = 1 AND propertyID IN (SELECT propertyID FROM rental WHERE renterID = ".$id.")";
                                        $propertyInfo = $connection -> query($sql);
                                        $propertyList = "
                                        <div class='container'>
                                            <div class='row'>";
                                        if($propertyInfo -> num_rows > 0) {
                                            while($row = $propertyInfo -> fetch_assoc()) {
                                                $userID = $row['userID'];
                                                $propertyID = $row['propertyID'];
                                                $directory = "uploads/".$userID."/".$propertyID."/";
                                                $pictures = scandir($directory);
                                                if(sizeof($pictures) == 2) {
                                                    $html = "<img src='images/noImage.jpg' style ='max-width: 200px; height: auto;' alt='' />";
                                                } else {
                                                    $path = $directory . $pictures[2];
                                                    $html = "<img src='" . $path . "' style ='max-width: 200px; height: auto;' alt='' />";
                                                }

                                                $propertyList .= "
                                                <section class='6u 12u(narrower)'>
                                                    <a href='listing.php?address=".$row['address']."&propertyID=".$row['propertyID']."' class='image left'>".$html."</a>

                                                    <div class='inner'>
                                                        <strong>$".$row['price'] . "</strong></br>
                                                        ".$row['bedroom']." Bedrooms</br>
                                                        ".$row['address']."</br>
                                                        ".$row['city'].", ".$row['state']." ".$row['zipcode']."</br>
                                                    </div>
                                                </section>";

                                            }

                                        } else {
                                            $propertyList .= "
                                            <h4>You are not renting any properties</h4>
                                                ";
                                        }
                                        // show the generated list
                                        echo $propertyList."
                                            </div>
                                        </div>
                                    ";
                                        ;
                                        ?>
                                    </section>
                                </article>
                                <div class="customHr">.</div>
                                <br>
                                <!-- Show User's Notifications -->
                                <article>
                                    <header>
                                        <h2 style="display: inline; margin-right: 2em;">Your Notifications (<span class='count'></span> Unread)</h2>
                                    </header>
                                    <div>
                                        <ul class='dropdown-menu'></ul>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

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