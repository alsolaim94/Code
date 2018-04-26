<?php

    $connection = mysqli_connect("localhost", "alsolaim_akari", "akari12345", "alsolaim_akari");

    if(mysqli_connect_errno($connection)) {
        echo "Failed to connect";
    } else {
        $userID = $_POST['userID'];
        $propID = $_POST['propID'];
        $imgString = $_POST['imgString'];
        
        $binary = base64_decode($imgString);
        header('Content-Type: bitmap; charset=utf-8');
        
        $folder = "../uploads/".$userID."/".$propID."/";
        
        $file = fopen($folder.'uploaded_image.jpeg', 'wb');
        fwrite($file, $binary);
        fclose($file);
        
        echo "UPLOADED";
        
    }
?>