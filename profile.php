<?php

session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  echo "You must log in before viewing your profile page!";
  header("location: loginsignup.html");    
}
else {
    $email = $_SESSION['email'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $active = $_SESSION['active'];
}


?>

<!DOCTYPE html>
<html>
    <head>
    
    </head>

    <body>
        <h1>
        
            <?php
                echo "Welcome " . $firstName . " " . $lastName;
            ?>
        
        </h1>
    
    </body>
</html>