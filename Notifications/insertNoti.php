<?php

include "../MySQL_Functions.php";
$connection = getMySQLConnection();

// if form from index has been submitted
if(isset($_POST["subject"])) {

    $subject = mysqli_real_escape_string($connection, $_POST["subject"]);

    $comment = mysqli_real_escape_string($connection, $_POST["comment"]);

    $sql = "INSERT INTO comments(comment_subject, comment_text)VALUES ('$subject', '$comment')";

    $connection -> query($sql);
 
}
 
?>