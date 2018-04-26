<?php
session_start();

include '../MySQL_Functions.php';
include "../Mail_Functions.php";

$connection = getMySQLConnection();
// doesnt allow user to type this page in address bar
if (!isset($_SERVER['HTTP_REFERER'])) {
    header("Location: ../profile.php");
    exit;
}
//if a connection cannot be established, dies
if ($connection->connect_error) {
    $connection->close;
    die("No MySQL server");
    header("Location: profile.php");

} else {


    //rentalID all ready difin
    $landlordID = $_SESSION['id'];
    $renterID = $_POST['renterID'];
    $propertyID = $_POST['propertyID'];
    $startDate = $_POST['startDate'];
    $endDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($startDate)) . " + 365 day"));


    $sql = "INSERT INTO `rental`(`landlordID`, `renterID`, `propertyID`, `startDate`, `endDate`) VALUES ('$landlordID','$renterID','$propertyID','$startDate','$endDate')";

    //add to the database
    $connection->query($sql);

    $sql2 = "UPDATE `property` SET `rented`='1' WHERE `propertyID` = '$propertyID'";

    //add to the database
    $connection->query($sql2);


    // get info for property that is being rented
    $sql = "SELECT * FROM property WHERE propertyID = " . $propertyID;
    $propertyQuery = $connection -> query($sql);
    $propertyInfo = $propertyQuery -> fetch_assoc();

    $address = $propertyInfo['address'];
    $city = $propertyInfo['city'];
    $state = $propertyInfo['state'];
    $zip = $propertyInfo['zipcode'];
    $price = $propertyInfo['price'];
    $country = $propertyInfo['country'];
    $lease = $propertyInfo['lease'];

    // get info for landlord
    $sql = "SELECT * FROM users WHERE id = " . $landlordID;
    $landlordQuery = $connection -> query($sql);
    $landlordInfo = $landlordQuery -> fetch_assoc();

    $landlordFirstname = $landlordInfo['firstName'];
    $landlordLastname = $landlordInfo['lastName'];
    $landlordEmail = $landlordInfo['email'];
    $landlordPhone = $landlordInfo['phone'];


    // get info for renter
    $sql = "SELECT * FROM users WHERE id = " . $renterID;
    $renterQuery = $connection -> query($sql);
    $renterInfo = $renterQuery -> fetch_assoc();

    $renterFirstname = $renterInfo['firstName'];
    $renterLastname = $renterInfo['lastName'];
    $renterEmail = $renterInfo['email'];
    $renterPhone = $renterInfo['phone'];


    // email to landlord
    $to = $landlordEmail;
    $subject = "You have successfully rented out your property to " . $renterFirstname . " " . $renterLastname;
    $body =
$landlordFirstname . " " . $landlordLastname . ", 

You have successfully rented out your property to ".$renterFirstname." ".$renterLastname." at the following address: 

".$address."
".$city.", ".$state." ".$zip."
".$country."

The lease begins today, ".date('M d Y', strtotime($startDate))." and will last until 1 year from today. " . $renterFirstname . " " . $renterLastname . " will pay $" . $price . " " .$lease."

The renter's contact information is below:

Email: " . $renterEmail . "
Phone: " . $renterPhone . "

Thank you for using Akari to rent your properties. We greatly appreciate it,

Akari Team";


    $mail = getMailObject();
    $mail -> addAddress($to);
    $mail -> Subject = $subject;
    $mail -> Body = $body;

    $mail -> send();



    // email to renter
    $to = $renterEmail;
    $subject = "You have successfully rented a property from " . $landlordFirstname . " " . $landlordLastname;
    $body =
$renterFirstname . " " . $renterLastname . ",

You have successfully rented a property from " . $landlordFirstname . " " . $landlordLastname . " at the following address: 

".$address."
".$city.", ".$state." ".$zip."
".$country."       

The lease begins today, ".date('M d Y', strtotime($startDate))." and will last until 1 year from today. You will owe " . $landlordFirstname . " " . $landlordLastname . " $" .$price. " " .$lease."

The landlord's contact information is below:

Email: " . $landlordEmail . "
Phone: " . $landlordPhone . "

Thank you for renting a property through Akari. We greatly appreciate it,

Akari Team";

    $mail = getMailObject();
    $mail -> addAddress($to);
    $mail -> Subject = $subject;
    $mail -> Body = $body;

    $mail -> send();


    // send renter notification of rental to their profile
    date_default_timezone_set('America/Chicago');
    $date = date('Y-m-d H:i:s');



    $subject = "Thank you for renting my property!";
    $comment = "I appreciate your business. Feel free to contact me";
    $toID = $renterID;
    $fromEmail = $landlordEmail;
    $interestedProperty = $propertyID;

    $sql = "INSERT INTO comments(comment_subject, comment_text, comment_to, comment_from, time, propertyID)VALUES ('$subject', '$comment', '$toID', '$fromEmail', '$date', '$interestedProperty')";

    $connection -> query($sql);




    header("Location: ../profile.php");


}


?>