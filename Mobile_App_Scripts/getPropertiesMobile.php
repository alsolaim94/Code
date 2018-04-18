<?php

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
        }
        
    }

?>