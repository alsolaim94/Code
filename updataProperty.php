<?php
session_start();

include 'MySQL_Functions.php';
$connection = getMySQLConnection();


//if a connection cannot be established, dies
if ($connection->connect_error) {
    $connection->close;
    die("No MySQL server");
    header("Location: profile.php");

} else {

    $propertyID = $_SESSION['propertyID'];


    $email = $_SESSION['email'];
    $propertyName = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['propertyName']));
    $country = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['country']));
    $address = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['address']));
    $city = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['city']));
    $state = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['state']));
    $zipcode = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['zipcode']));
    $type = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['type']));
    $size = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['size']));
    $bedroom = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['bedroom']));
    $bathroom = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['bathroom']));
    $extra = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['extra']));
    $lease = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['lease']));
    $price = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['price']));
    $availability = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['availability']));
    $contraction = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['contraction']));
    $problem = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['problem']));


    if (!isset($_POST['rented'])) {
        $rented = 0;
    } else {
        $rented = 1;
    }


    $sql = "UPDATE `property` SET `propertyName`='$propertyName',`country`='$country',`address`= '$address',`city`='$city',`state`='$state',`zipcode`='$zipcode',`type`='$type',`size`='$size',`bedroom`='$bedroom',`bathroom`='$bathroom',`extra`='$extra',`lease`='$lease',`price`='$price',`availability`='$availability',`construction`='$contraction', `rented`='$rented' WHERE `propertyID` = '$propertyID'";


    //add to the database
    $connection->query($sql);


    header("Location: profile.php");


}


?>