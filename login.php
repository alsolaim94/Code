<?php 

include "MySQL_Functions.php";

$connection = getMySQLConnection();

$email = mysqli_real_escape_string($connection, $_POST['email']);
$email = htmlspecialchars($email);

$userExists = $connection -> query("SELECT * FROM users WHERE email = '$email'");

// user does not exists
if($userExists -> num_rows == 0) {
    echo "<script>
            alert('Email is not Registered');
            window.location.href='loginsignup.php';
          </script>";

    // user does exists, continue log in    
} else {
    $user = $userExists -> fetch_assoc();

    //if the password is correct
    if(password_verify($_POST['password'], $user['password'])) {
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['lastName'] = $user['lastName'];
        $_SESSION['id'] = $user['id'];
        //0 until user activates their account with verify.php
        $_SESSION['active'] = $user['active']; 
        // So we know the user has logged in
        $_SESSION['logged_in'] = true; 

        header("location: profile.php");

        // password is inccorect
    } else {
        echo "<script>
                alert('Password is Incorrect');
                window.location.href='loginsignup.php';
             </script>";
    }







}








?>