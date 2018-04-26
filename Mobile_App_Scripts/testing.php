<?php 
        
    $con = mysqli_connect("localhost", "alsolaim_akari", "akari12345", "alsolaim_akari");

    if(mysqli_connect_errno($con)) {
        echo "Failed to connect";
    }


    $sql = "SELECT * FROM property";

    $result = $con -> query($sql);

    while($row = $result -> fetch_assoc()) {
        print_r($row);
        echo "<br>";
    }
    
?>