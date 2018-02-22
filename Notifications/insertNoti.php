<?php

session_start();

include "../MySQL_Functions.php";
$connection = getMySQLConnection();

// if form from index has been submitted
if(isset($_POST["subject"])) {

    $subject = mysqli_real_escape_string($connection, $_POST["subject"]);

    $comment = mysqli_real_escape_string($connection, $_POST["comment"]);
    
    $toEmail = $_POST['toEmail'];
    $fromID = $_SESSION['id'];

    $sql = "INSERT INTO comments(comment_subject, comment_text, comment_to, comment_from)VALUES ('$subject', '$comment', '$toEmail', '$fromID')";

    $connection -> query($sql);
 
}
 
?>