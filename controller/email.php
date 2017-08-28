<?php
    require './PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();

    $to = "xsv2477@gmail.com";
    $from = $_POST["email"];
    $name = $_POST["name"];
    $sub = $_POST["subject"];
    $mess = $_POST["message"];
    
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    
    $mail->Username = "tpcv.hopto@gmail.com";
    $mail->Password = "Hashed247";
    
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
        echo "mail fail";
        echo $mail->ErrorInfo;
    }else{
        echo "mail success";
    }

?>