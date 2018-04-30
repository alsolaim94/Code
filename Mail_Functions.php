<?php

require "PHPMailer-master/PHPMailerAutoload.php";


function getMailObject() {
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = 'akari.test496@gmail.com'; 
    $mail->Password = 'Akari12345';
    
    $mail->setFrom('akari.test496'); 
    
    
    return $mail;

    
    
    
}

?>