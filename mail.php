<?php 

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)  ){
    session_start();
    $_SESSION['messagey']="wrong user name password";
    $UserName = $_POST["name"];
    $UserEmail = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $to = "sanchukanirupama@gmail.com";
    $body = "";

    $body .="From: ".$UserName. "\r\n";
    $body .="Email: ".$UserEmail. "\r\n";
    $body .="message: ".$message. "\r\n";

    mail($to,$subject,$body);

    header('location:index.php');
    }
    else{
        session_start();
        $_SESSION['messagez']="wrong user name password";
        header('location:index.php');
    }


 ?>
