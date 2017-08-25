<?php
     $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    echo $_POST["email"]. " " . $_POST["subject"] . " " . $_POST["message"];

    $mail_res = mail($_POST["email"], $_POST["subject"], $_POST["message"], $headers);
    echo $mail_res;
?>
