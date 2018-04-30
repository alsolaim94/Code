<?php

session_start();
include '../MySQL_Functions.php';

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
    echo "You must log in before viewing your profile page!";
    header("location: ../loginsignup.php");
}
else{
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
        <!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="../assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="../assets/css/ie9.css" /><![endif]-->

    </head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                        <li><a class='logoutButton' onclick='logout()'>Log Out</a></li>
                    </ul>
                </nav>

            </div>

            <!-- Main -->
            <section class="wrapper style1">
                <div class="container">
                    <div class="9u 12u(mobilep)">



                    <!-- PHP to generate the viewing of properties posted-->
                    <?php

                    $connection = getMySQLConnection();
                    $sql = "SELECT * FROM property WHERE rented = 0 AND userID = ".$id;
                    $propertyInfo = $connection -> query($sql);
                    ?>


                    <form action="startTenancy.php" method="post">

                        <div>Step 1: Enter renter Email Address:
                            <p><input type = "email" name="emailOfRenter" placeholder="Renter Email" required></p>
                        </div>


                        <div >Step 2: Enter Contract Date:
                            <p><input type="date" name="dataOfTenancy" value="<?php echo date("Y-m-d"); ?>" required></p>

                        </div>

                        <div>Step 3: Choose the Property That Is Being Rented:
                            <br><br>

                            <?php
                            $html = "";
                            if($propertyInfo -> num_rows > 0) {
                                while($row = $propertyInfo -> fetch_assoc()) {
                                    $html .= "<div style='overflow: hidden; width: 50%;'>
                                                  <div style='width: 20%; float: left;'>
                                                      <input type='radio' name='propertyID' value= ". $row['propertyID'] ." required>     
                                                  </div>
                                                  <div style='width: 80%; float: right;'>
                                                      <p><strong>Property Name: </strong>".$row['propertyName']." <br> <strong>Property Address:</strong> ".$row['address'] ."</p>
                                                  </div>
                                              </div>";
                                }
                                $html .= "<input type='submit' class='button' value='Submit' />";

                            } else {
                                $html .= "<h3 style= 'color:red'>There are no properties to be seen</h3>
                                          <a href='../addProperty.php' class='button'>Add New Property</a>";
                            }

                            echo $html;

                            ?>
                        </div>

                    </form>





                    </div>
                </div>
            </section>

            <!-- Footer -->

            <?php include '../bottom.html'; ?>
        </div>
        <!-- Scripts -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/jquery.dropotron.min.js"></script>
        <script src="../assets/js/skel.min.js"></script>
        <script src="../assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="../assets/js/main.js"></script>

    </body>
</html>