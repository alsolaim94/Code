<?php

// create connection akari server
$con = mysqli_connect("localhost", "alsolaim_akari", "akari12345", "alsolaim_akari");

//$con = mysqli_connect("localhost", "root", "", "akari");

$id = $_POST['propertyID'];


if (mysqli_connect_errno($con)) {
    $output = array("Failed to connect");
    echo json_encode($output);
} else {

    $output = "";
    $result = $con -> query("SELECT * FROM property WHERE propertyID = " . $id);
    if($result -> num_rows > 0) {
        $row = $result -> fetch_assoc();
        // each element in string is separated by a colon and the entry ends with \n
        $output .= implode(":",$row)."\n";
        echo $output;
    } else {
        $output = "No Information on this Property";
        echo $output;
    }

}


?>