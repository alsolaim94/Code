<?php

include 'MySQL_Functions.php';

$connection = getMySQLConnection();

//if a connection cannot be established, dies
if($connection->connect_error){
    $connection->close;
    die( "No MySQL server" );
}

//check to see if the email exists
$userExists = $connection -> query('SELECT * FROM users WHERE email = "' . $_POST["email"] . '"');

// if the user does not exists, execute register
if($userExists -> num_rows === 0) {

    // strip input to increase security
    $firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $password = mysqli_real_escape_string($connection, (password_hash($_POST['password'], PASSWORD_BCRYPT)));
    // hash value is unique and will be used to reset password
    $hashValue = mysqli_real_escape_string($connection, md5(rand(0,1000)));

    $sql = "INSERT INTO users (firstName, lastName, phone, email, password, hashValue) "
        ."VALUES ('$firstName','$lastName',$phone,'$email','$password', '$hashValue')";

    //add to the database
    $connection -> query($sql);

    $id = mysqli_insert_id($connection);


    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['email'] = $email;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    //0 until user activates their account with verify.php
    $_SESSION['active'] = 0; 
    // So we know the user has logged in
    $_SESSION['logged_in'] = true; 
    header("Location: profile.php");	


    // email already exists    
} else {
    echo "<script>
            alert('Username already Exists');
            window.location.href='loginsignup.html';
          </script>";
}






?>