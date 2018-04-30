<?php

session_start();

include "../MySQL_Functions.php";
$connection = getMySQLConnection();

// if form from listing has been submitted
if(isset($_POST["subject"])) {

    $subject = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["subject"]));

    $comment = htmlspecialchars(mysqli_real_escape_string($connection, $_POST["comment"]));

    $toID = $_POST['toID'];
    $interestedProperty = $_POST['property'];
    $fromEmail = $_SESSION['email'];

    date_default_timezone_set('America/Chicago');
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO comments(comment_subject, comment_text, comment_to, comment_from, time, propertyID)VALUES ('$subject', '$comment', '$toID', '$fromEmail', '$date', '$interestedProperty')";

    $connection -> query($sql);

}

?>