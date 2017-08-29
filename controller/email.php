<?php
    require './PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();

    $to = "thomaspearson.dev@gmail.com";
    $from = $_POST["email"];
    $name = $_POST["name"];
    $sub = $_POST["subject"];
    $mess = $_POST["message"];
    
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    
    $mail->Username = "cv email here";
    $mail->Password = "cv password here";
    
    $mail->SMTPSecure ="tsl";
    $mail->Port = 587;
    $mail->Sender = $from;
    $mail->Subject = $sub;
    $mail->Body= $mess;

    $mail->isSMTP();
    $mail->addReplyTo($from);
    $mail->setFrom($from, $name);
    $mail->addAddress($to);
    $mail->isHtml(true);

    if(!$mail->send()){
        echo json_encode(array('success'=>false, 'error_msg'=> $mail->ErrorInfo));
    }else{
        echo json_encode(array('success'=>true));
    }

?>