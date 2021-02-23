<?php 

$to = $_POST["staticemail"];
$message = $_POST["message"];
$subject = $_POST["staticname"];
$hospital = $_POST["token"];

$body = "";

$body .="Message : ".$message. "\r\n";
$body .="Please Reach Us Via : ".$hospital. "\r\n";

mail($to,$subject,$body);
header('location:notification.php');

 ?>
