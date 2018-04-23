<?
session_start();
include 'MySQL_Functions.php';
$connection = getMySQLConnection();


//if a connection cannot be established, dies
if($connection->connect_error){
	$connection->close;
	die( "Server is Unavailable" );
    header("Location: profile.php");
    
}
else{
    
    $userID = $_SESSION['id'];
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

    $sql = "INSERT INTO `property`(`userID`, `propertyName`, `country`, `address`, `city`, `state`, `zipcode`, `type`, `size`, `bedroom`, `bathroom`, `extra`, `lease`, `price`, `availability`, `construction`, `problem`, `rented`, `flagCount`) VALUES ('$userID','$propertyName','$country','$address','$city','$state','$zipcode','$type',$size,$bedroom,$bathroom,'$extra','$lease',$price,$availability,$contraction, '$problem', 0, 0)";

    //add to the database
    $connection -> query($sql);

    // make directory for images for this specific property
    $sql = "SELECT max(propertyID) FROM property WHERE userID = " . $_SESSION['id'];
    $result = $connection -> query($sql);
    $row = $result -> fetch_assoc();
    $propertyid = $row['max(propertyID)'];

    if(!file_exists("uploads/".$userID)){
        mkdir ("uploads/".$userID);
    }

    mkdir ( "uploads/".$userID."/".$propertyid);





    header("Location: uploadImage.php");
    
}




?>