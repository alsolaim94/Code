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

    // strip all input from the form
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

    // insert into database
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

$connection -> close();



?>