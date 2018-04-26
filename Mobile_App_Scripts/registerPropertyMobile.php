<?php

    $connection = mysqli_connect("localhost", "alsolaim_akari", "akari12345", "alsolaim_akari");

    if(mysqli_connect_errno($connection)) {
        echo "Failed to connect";
    } else {
        $email = mysqli_real_escape_string($connection, $_POST['email']);
            
        $sql = "SELECT id FROM users WHERE email = '".$email."'";
        $result = $connection -> query($sql);
        $row = $result -> fetch_assoc();
                
        $userID = $row['id'];
        $propertyName = mysqli_real_escape_string($connection, $_POST['propName']);
        $country = mysqli_real_escape_string($connection, $_POST['country']);
        $address = mysqli_real_escape_string($connection, $_POST['street']);
        $city = mysqli_real_escape_string($connection, $_POST['city']);
        $state = mysqli_real_escape_string($connection, $_POST['state']);
        $zipcode = mysqli_real_escape_string($connection, $_POST['zip']);
        $type = mysqli_real_escape_string($connection, $_POST['propType']);
        $size = mysqli_real_escape_string($connection, $_POST['size']);
        $bedroom = mysqli_real_escape_string($connection, $_POST['numBed']);
        $bathroom = mysqli_real_escape_string($connection, $_POST['numBath']);
        $extra = mysqli_real_escape_string($connection, $_POST['description']); 
        $lease = mysqli_real_escape_string($connection, $_POST['leaseTerm']);
        $price = mysqli_real_escape_string($connection, $_POST['price']);
        $availability = mysqli_real_escape_string($connection, $_POST['availability']);
        $contraction = mysqli_real_escape_string($connection, $_POST['construction']);
        $problem = mysqli_real_escape_string($connection, $_POST['problems']);        
        
        $sql = "INSERT INTO `property`(`userID`, `propertyName`, `country`, `address`, `city`, `state`, `zipcode`, `type`, `size`, `bedroom`, `bathroom`, `extra`, `lease`, `price`, `availability`, `construction`, `problem`, `rented`, `flagCount`) VALUES (".$userID.",'$propertyName','$country','$address','$city','$state','$zipcode','$type',$size,$bedroom,$bathroom,'$extra','$lease',$price,$availability,$contraction, '$problem', 0, 0)";        
        
        
        if($connection -> query($sql) == TRUE) {
            //make directory for images for this specific property
            $sql = "SELECT max(propertyID) FROM property WHERE userID = " . $userID;
            $result = $connection -> query($sql);
            $row = $result -> fetch_assoc();
            $propertyid = $row['max(propertyID)'];
                
            if(!file_exists("../uploads/".$userID)){
                mkdir ("../uploads/".$userID);
            }
        
            mkdir ( "../uploads/".$userID."/".$propertyid);
            
            echo $userID .",". $propertyid;
        } else {
            echo "FAIL";
        }
        


    }

    







?>