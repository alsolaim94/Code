<?php

session_start();

include "../MySQL_Functions.php";
$connection = getMySQLConnection();
 
if(isset($_POST['view'])){
    
    if($_POST["view"] != '') {
        $updateSQL = "UPDATE comments SET comment_status = 1 WHERE comment_status=0 AND comment_to=".$_SESSION['email'];
        $connection -> query($updateSQL);
    }

    $sql = "SELECT * FROM comments WHERE comment_to = '".$_SESSION['email']."' ORDER BY comment_id DESC LIMIT 5";
    $result = $connection -> query($sql);
    $output = "";

    if($result -> num_rows > 0) {
        while($row = $result -> fetch_assoc()) {
          $output .= "
          <li style='border: 1px solid white; border-radius: 10px;'>
              <a href='#' style='color: white;'>
                  <strong>".$row['comment_subject']."</strong><br />
                  <small><em>".$row['comment_text']."</em></small>
              </a>
          </li>
          ";
        }
    } else {
        $output .= "<li><a href='#' class='text-bold text-italic'>No Noti Found</a></li>";
    }

    $status_query = "SELECT * FROM comments WHERE comment_status=0 AND comment_to='".$_SESSION['email']."'";
    $result_query = $connection -> query($status_query);
    $count = $result_query -> num_rows;

    $data = array(
       'notification' => $output,
       'unseen_notification'  => $count
    );
    
    echo json_encode($data);
} 

?>