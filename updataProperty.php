<?php
session_start();

include 'MySQL_Functions.php';
$connection = getMySQLConnection();


//if a connection cannot be established, dies
if($connection->connect_error){
    $connection->close;
    die( "No MySQL server" );
    header("Location: profile.php");

}
else{



    // $userID =  we should use user ID
    //    $propertyID = $_SESSION['propertyID'];

    $propertyID = $_SESSION['propertyID'];



    $email = $_SESSION['email'];
    $propertyName = mysqli_real_escape_string($connection, $_POST['propertyName']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $state = mysqli_real_escape_string($connection, $_POST['state']);
    $zipcode = mysqli_real_escape_string($connection, $_POST['zipcode']);
    $type = mysqli_real_escape_string($connection, $_POST['type']);
    $size = mysqli_real_escape_string($connection, $_POST['size']);
    $bedroom = mysqli_real_escape_string($connection, $_POST['bedroom']);
    $bathroom = mysqli_real_escape_string($connection, $_POST['bathroom']);
    $extra = mysqli_real_escape_string($connection, $_POST['extra']); 
    $lease = mysqli_real_escape_string($connection, $_POST['lease']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    $availability = mysqli_real_escape_string($connection, $_POST['availability']);
    $contraction = mysqli_real_escape_string($connection, $_POST['contraction']);
    $problem = mysqli_real_escape_string($connection, $_POST['problem']);

    $rented = $_POST['rented'];







    $sql = "UPDATE `property` SET `propertyName`='$propertyName',`country`='$country',`address`= '$address',`city`='$city',`state`='$state',`zipcode`='$zipcode',`type`='$type',`size`='$size',`bedroom`='$bedroom',`bathroom`='$bathroom',`extra`='$extra',`lease`='$lease',`price`='$price',`availability`='$availability',`contraction`='$contraction', `rented`='$rented' WHERE `propertyID` = '$propertyID'";


    //add to the database
    $connection -> query($sql);




    print $rented;




    //header("Location: profile.php");


}




?>