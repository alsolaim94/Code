<?php
session_start();

include 'MySQL_Functions.php';
$connection = getMySQLConnection();


//if a connection cannot be established, dies
if ($connection->connect_error) {
    $connection->close;
    die("No MySQL server");
    header("Location: profile.php");

}

// if you are not logged in you cannot see this page
if ($_SESSION['logged_in'] != 1) {
    header("location: loginsignup.php");
} else {

    $id = $_SESSION['id'];

    // strip all input
    $firstName = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['firstName']));
    $lastName = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['lastName']));
    $email = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['email']));

    // update row in database
    $sql = "UPDATE `users` SET `firstName`='" . $firstName . "',`lastName`='" . $lastName . "',`email`='" . $email . "' WHERE `id` = $id ";


    //add to the database
    $connection->query($sql);

    $_SESSION["firstName"] = $firstName;
    $_SESSION["lastName"] = $lastName;
    $_SESSION["email"] = $email;

    $connection -> close();

    header("Location: profile.php");

}

?>