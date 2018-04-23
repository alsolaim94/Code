<?php
session_start();

include '../MySQL_Functions.php';
$connection = getMySQLConnection();
//// doesnt allow user to type this page in address bar
if(!isset($_SERVER['HTTP_REFERER'])) {
    header("Location: ../profile.php");
    exit;
}
//if a connection cannot be established, dies
if($connection->connect_error){
    $connection->close;
    die( "No MySQL server" );
    header("Location: profile.php");

}
else{




    
    
    
    //rentalID all ready difin
    $landlordID = $_SESSION['id'];
    $renterID = $_POST['renterID'];
    $propertyID = $_POST['propertyID'];  
    $startDate = $_POST['startDate'];
    $endDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($startDate)) . " + 365 day"));
    

    
    $sql = "INSERT INTO `rental`(`landlordID`, `renterID`, `propertyID`, `startDate`, `endDate`) VALUES ('$landlordID','$renterID','$propertyID','$startDate','$endDate')";

    //add to the database
    $connection -> query($sql);

$sql2 = "UPDATE `property` SET `rented`='1' WHERE `propertyID` = '$propertyID'";

    //add to the database
    $connection -> query($sql2);
    

//echo  $landlordID." ".$renterID." ".$propertyID." ".$startDate." end time: ". $endDate;



    header("Location: ../profile.php");	


}




?>