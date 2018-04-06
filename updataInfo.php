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
//    $proprtyID = $_SESSION['proprtyID'];
    
    $id = $_SESSION['id'];
    
    $firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);





    

    
    $sql = "UPDATE `users` SET `firstName`='".$firstName."',`lastName`='".$lastName."' WHERE `id` = $id ";
    

    //add to the database
    $connection -> query($sql);

    $_SESSION["firstName"] = $firstName;
    $_SESSION["lastName"] = $lastName;
    

    
    
    echo $firstName . " ".$lastName ." ".$email ." with id ". $id  ;

header("Location: profile.php");	

    
}




?>