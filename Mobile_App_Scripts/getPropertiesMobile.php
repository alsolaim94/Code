<?php

<<<<<<< HEAD
// create connection akari server
//$con = mysqli_connect("localhost", "alsolaim_akari", "akari12345", "alsolaim_akari");

$con = mysqli_connect("localhost", "root", "", "akari");



if (mysqli_connect_errno($con)) {
    $output = array("Failed to connect");
    echo json_encode($output);
} else {

    //$output = array();
    // try out the array being a string instead
    $output = "";
    $result = $con -> query("SELECT * FROM property");
    if($result -> num_rows > 0) {
        while($row = $result -> fetch_assoc()) {
            //$output[] = $row;
            // each element in string is separated by a colon and the entry ends with \n
            $output .= implode(":",$row)."\n";
=======
    // create connection akari server
    //$con = mysqli_connect("localhost", "alsolaim_akari", "akari12345", "alsolaim_akari");

    $con = mysqli_connect("localhost", "root", "", "akari");

    if (mysqli_connect_errno($con)) {
        $output = array("Failed to connect");
        echo json_encode($output);
    } else {
        
        $output = array();
        $result = $con -> query("SELECT * FROM property");
        if($result -> num_rows > 0) {
            while($row = $result -> fetch_assoc()) {
                $output[] = $row;
            }
            echo json_encode($output);
        } else {
            $output = array("There are no properties");
            echo json_encode($output);
>>>>>>> 1191fc9df9ac95dfb9df8e89960766dd3dc5868e
        }
        echo $output;
        //echo json_encode($output);
    } else {
        $output[] = "No Properties";
        echo json_encode($output);
    }

<<<<<<< HEAD
}


=======
>>>>>>> 1191fc9df9ac95dfb9df8e89960766dd3dc5868e
?>