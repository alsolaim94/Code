<?php

session_start();

include "MySQL_Functions.php";
include "Mail_Functions.php";

$connection = getMySQLConnection();

if(isset($_POST['view'])){
    $propertyID = $_POST['view'];
    $sql = "SELECT * FROM property WHERE propertyID = ".$propertyID;
    $result = $connection -> query($sql);
    $propertyRow = $result -> fetch_assoc();
    
    $newCount = $propertyRow['flagCount'] + 1;
    
    if($newCount > 5) {
        
        $userResult = $connection -> query("SELECT * FROM users WHERE id = ".$propertyRow['userID']);
        $userRow = $userResult -> fetch_assoc();
        
        
        $to = "akari.test496@gmail.com";
        $subject = "A property has recieved more than the limit of flag counts";
        $body = 
            "ALERT:
A property has recieved more than five flags. Here are the details.
PropertyID: ".$propertyID."
Address: ". $propertyRow['address']."
Owner's Email: ".$userRow['email']."
Owner's Phone Number: ".$userRow['phone']."

Current Flag Count: ".$newCount."

Please contact owner and check legitimacy of the property";
        
        $mail = getMailObject();
        $mail -> addAddress($to);
        $mail -> Subject = $subject;
        $mail -> Body = $body;
        
        $mail -> send();
        
        $sql2 = "UPDATE `property` SET flagCount = ".$newCount." WHERE propertyID = ".$propertyID;
        $connection -> query($sql2);
        
        $data = array(
            'alert' => 'Thank you for providing feedback'    
        );
    } else {
        $sql2 = "UPDATE `property` SET flagCount = ".$newCount." WHERE propertyID = ".$propertyID;
        $connection -> query($sql2);
        $data = array(
            'alert' => 'Thank you for providing feedback'    
        );
    }
    
    echo json_encode($data);
    
    
    
}


?>