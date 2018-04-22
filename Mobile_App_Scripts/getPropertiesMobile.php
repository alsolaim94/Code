<?php

$con = mysqli_connect("localhost", "alsolaim_akari", "akari12345", "alsolaim_akari");

if (mysqli_connect_errno($con)) {
    $output = "Failed to connect";
    echo $output;
} else {
    // try out the array being a string instead
    $output = "";
    $result = $con->query("SELECT * FROM property");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //$output[] = $row;
            // each element in string is separated by a colon and the entry ends with \n
            $output .= implode(":", $row) . "\n";
        }
        echo $output;
    } else {
        $output = "There are no properties";
        echo $output;
    }
}
?>