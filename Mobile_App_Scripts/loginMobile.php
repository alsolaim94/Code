<?php 

    // create connection local machine
    $con = mysqli_connect("localhost","root","","akari");

    // create connection akari server
    //$con = mysqli_connect("localhost", "alsolaim_akari", "akari12345", "alsolaim_akari");


    if (mysqli_connect_errno($con)) {
        echo "Failed to connect";
    }

    // escape input
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // see if a user exists with given email
    $userExists = $con -> query("SELECT * FROM users WHERE email = '$email'");

    // user does not exists
    if($userExists -> num_rows == 0) {
        echo "Email is not Registered";

      // user does exists, continue log in    
    } else {
        $user = $userExists -> fetch_assoc();

        //if the password is correct
        if(password_verify($_POST['password'], $user['password'])) {
            // echo eash value returned from the query separated by comma
            foreach($user as $value) {
                echo $value.",";
            }
            
          // password is inccorect
        } else {
            echo "Password is Incorrect";
        }

    }

    mysqli_close($con);

?>