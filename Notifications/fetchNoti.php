<?php

session_start();

include "../MySQL_Functions.php";
$connection = getMySQLConnection();

if(isset($_POST['view'])){

    if($_POST["view"] != '') {
        $element = $_POST["view"];
        $int = (int)$element;
        $updateSQL = "UPDATE comments SET comment_status = 1 WHERE comment_id=".$int." AND comment_to='".$_SESSION['id']."'";
        $connection -> query($updateSQL);
    }

    $sql = "SELECT * FROM comments WHERE comment_to = '".$_SESSION['id']."' ORDER BY comment_id DESC LIMIT 5";
    $result = $connection -> query($sql);
    $output = "";

    if($result -> num_rows > 0) {
        while($row = $result -> fetch_assoc()) {
            $timeFromDB = $row['time'];
            $time = date('M d Y, h:i A', strtotime($timeFromDB));
            $contactInfoQuery = $connection -> query("SELECT * FROM users WHERE email='".$row['comment_from']."'");
            $propertyInfoQuery = $connection -> query("SELECT * FROM property WHERE propertyID = ".$row['propertyID']);
            $propertyRow = $propertyInfoQuery -> fetch_assoc();
            $contactRow = $contactInfoQuery -> fetch_assoc();
            if($row['comment_status'] == 0) {
                $output .= "
                      <li class='notiElement dropdown-toggle' style='background-color: #e6e6e6; overflow: hidden' value=".$row['comment_id'].">
                          <center><u><strong>Property: ".$propertyRow['address']."</strong></u></center>
                          <div style='width: 50%; float: left'>
                              <strong>Subject: ".$row['comment_subject']."</strong><br />
                              <small>Body: <em>".$row['comment_text']."</em></small><br />
                              <small>".$time."</small>   
                          </div>
                          <div style='width: 50%; float: right; text-align: right'>
                              <strong>Contact Info: </strong><br />
                              <small>Name: ".$contactRow['firstName']." ".$contactRow['lastName']."</small><br />
                              <small>Email: ".$row['comment_from']."</small><br />
                              <small>Phone: ".$contactRow['phone']."</small><br />
                          </div> 
                      </li>
                "; 
            } else {
                $output .= "
                      <li class='notiElement dropdown-toggle' style='overflow: hidden' value=".$row['comment_id'].">
                          <center><u><strong>Property: ".$propertyRow['address']."</strong></u></center>
                          <div style='width: 50%; float: left'>
                              <strong>Subject: ".$row['comment_subject']."</strong><br />
                              <small>Body: <em>".$row['comment_text']."</em></small><br />
                              <small>".$time."</small>   
                          </div>
                          <div style='width: 50%; float: right; text-align: right'>
                              <strong>Contact Info: </strong><br />
                              <small>Name: ".$contactRow['firstName']." ".$contactRow['lastName']."</small><br />
                              <small>Email: ".$row['comment_from']."</small><br />
                              <small>Phone: ".$contactRow['phone']."</small><br />
                          </div>
                      </li>
                ";    
            }
        }
    } else {
        $output .= "<li style='color:rgb(70, 193, 249)'><strong>No New Notifications</strong></li>";
    }

    $status_query = "SELECT * FROM comments WHERE comment_status=0 AND comment_to='".$_SESSION['id']."'";
    $result_query = $connection -> query($status_query);
    $count = $result_query -> num_rows;

    $data = array(
        'notification' => $output,
        'unseen_notification'  => $count
    );

    echo json_encode($data);
} 

?>