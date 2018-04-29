<?php

session_start();

include "MySQL_Functions.php";
include "Mail_Functions.php";

$connection = getMySQLConnection();

if(!isset($_SESSION['id'])) {
    $data = array(
                'alert' => 'You must be logged in to provide feedback'    
            );
    echo json_encode($data);
} else {
    if(isset($_POST['view'])){
        $propertyID = $_POST['view'];

        // check if user has already flagged this property
        $sql = "SELECT * FROM flag WHERE userID = ".$_SESSION['id']." AND propertyID = ".$propertyID;
        $result = $connection -> query($sql);
        if($result -> num_rows > 0) {
            $data = array(
                'alert' => 'You have already provided feedback for this property. Thank you.'
            );
            echo json_encode($data);
        } else {

            // store that the user has flagged this property
            $sql = "INSERT INTO flag (userID, propertyID) VALUES (".$_SESSION['id'].", ".$propertyID.")";
            $connection -> query($sql);

            $sql = "SELECT * FROM property WHERE propertyID = " . $propertyID;
            $result = $connection->query($sql);
            $propertyRow = $result->fetch_assoc();

            $newCount = $propertyRow['flagCount'] + 1;

            if ($newCount > 5) {

                $userResult = $connection->query("SELECT * FROM users WHERE id = " . $propertyRow['userID']);
                $userRow = $userResult->fetch_assoc();


                $to = "akari.test496@gmail.com";
                $subject = "A property has recieved more than the limit of flag counts";
                $body =
                    "ALERT:
    A property has recieved more than five flags. Here are the details.
    PropertyID: " . $propertyID . "
    Address: " . $propertyRow['address'] . "
    Owner's Email: " . $userRow['email'] . "
    Owner's Phone Number: " . $userRow['phone'] . "

    Current Flag Count: " . $newCount . "

    Please contact owner and check legitimacy of the property";

                $mail = getMailObject();
                $mail->addAddress($to);
                $mail->Subject = $subject;
                $mail->Body = $body;

                $mail->send();

                $sql2 = "UPDATE `property` SET flagCount = " . $newCount . " WHERE propertyID = " . $propertyID;
                $connection->query($sql2);

                $data = array(
                    'alert' => 'Thank you for providing feedback'
                );

            } else {
                $sql2 = "UPDATE `property` SET flagCount = " . $newCount . " WHERE propertyID = " . $propertyID;
                $connection->query($sql2);
                $data = array(
                    'alert' => 'Thank you for providing feedback'
                );
            }
            echo json_encode($data);
        }
    }
}


?>