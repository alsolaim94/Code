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

if ($_SESSION['logged_in'] != 1) {
    echo "You must log in before editing your Info!";
    header("location: loginsignup.php");
} else {

    $id = $_SESSION['id'];

    $firstName = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['firstName']));
    $lastName = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['lastName']));
    $email = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['email']));


    $sql = "UPDATE `users` SET `firstName`='" . $firstName . "',`lastName`='" . $lastName . "',`email`='" . $email . "' WHERE `id` = $id ";


    //add to the database
    $connection->query($sql);

    $_SESSION["firstName"] = $firstName;
    $_SESSION["lastName"] = $lastName;
    $_SESSION["email"] = $email;


    header("Location: profile.php");

}

?>