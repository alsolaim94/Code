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


<<<<<<< HEAD
    $email = $_SESSION['email'];
=======

    
   // $userID =  we \\ should use user ID
    $email = $_SESSION['email'];
    
>>>>>>> DisplayProperties
    $propertyName = mysqli_real_escape_string($connection, $_POST['propertyName']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $state = mysqli_real_escape_string($connection, $_POST['state']);
    $zipcode = mysqli_real_escape_string($connection, $_POST['zipcode']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
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


    //use to check type $type = $_FILES ['file']['type'];

/*
    if(isset($_POST['submit'])) {
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $tmp_name = $_FILES['file']['tmp_name'];
        if(isset($name)){
            if(!empty($name)&&$size<300000){
                $folder = 'uploads/';
                if(move_uploaded_file($tmp_name, $folder.$name)){
                    echo 'Your image was uploaded';
                }
                else{
                    echo 'There was an error uploading your image';
                }
            }
            else{
                echo 'Please select an image';
            }
        }
    }

*/




    
   $sql = "INSERT INTO `property`(`email`, `propertyName`, `country`, `address`, `city`, `state`, `zipcode`, `phone`, `type`, `size`, `bedroom`, `bathroom`, `extra`, `lease`, `price`, `availability`, `contraction`, `problem`) VALUES ('$email','$propertyName','$country','$address','$city','$state','$zipcode','$phone','$type',$size,$bedroom,$bathroom,'$extra','$lease',$price,$availability,$contraction, '$problem')";
    
    

    //add to the database
    $connection -> query($sql);

<<<<<<< HEAD
print $propertyName . " " . $country. " " .$address. " " .$city . " " .$state . " " .$zipcode. " " . $phone . " " .$type . " " .$size . " " .$bedroom. " " . $bathroom. " " . $extra . " " .$lease . " " .$price . " " .$availability. " " .$contraction . " " .$problem ;
//
//print $email;
    





 header("Location: profile.php");	
=======
    header("Location: profile.php");	
    
>>>>>>> DisplayProperties
    
}




?>