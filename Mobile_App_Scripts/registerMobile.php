<?php 
        
    $con = mysqli_connect("localhost", "alsolaim_akari", "akari12345", "alsolaim_akari");

    if(mysqli_connect_errno($con)) {
        echo "Failed to connect";
    }

    $email = mysqli_real_escape_string($con, $_POST['email']);

    //check to see if the email exists
    $userExists = $con -> query('SELECT * FROM users WHERE email = "' . $_POST["email"] . '"');

    // if it doesnt exist, register user
    // if it does exist, username already exists
    if($userExists -> num_rows === 0) {
        
        // escape input
        $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $password = mysqli_real_escape_string($con, (password_hash($_POST['password'], PASSWORD_BCRYPT)));
        
        // hash value is unique and will be used to reset password
        $hashValue = mysqli_real_escape_string($con, md5(rand(0,1000)));
        
        $sql = "INSERT INTO users (firstName, lastName, email, phone, password, hashValue) "
                ."VALUES ('$firstName','$lastName','$email', '$phone', '$password', '$hashValue')";
        
        // add to database
        $con -> query($sql);
        
        echo $firstName . "," . $lastName . "," . $email;
        
    } else {
        echo "Username already exists";
    }

    mysqli_close($con);
    
?>