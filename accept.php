<?php
session_start();
include('database.php');

if(isset($_POST['submit'])) {

$donor = $_POST['staticemail'];
$token = $_POST['token'];
$tele = $_POST['teleno'];
$weight = $_POST['weight'];
$medi = $_POST['medic'];
$date = date('y-m-d h:i:s');

$result = $mysqli ->query("SELECT*FROM acceptreq WHERE donoremail='$donor' && token='$token'");
$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['message01']="Already Accepted";
    header("location:userprofile.php");
}
else{
    $_SESSION['message02']=$token;
    $mysqli->query("INSERT INTO acceptreq(token , hospital_email , hospitalname , bloodGroup , donorName , gender , weight , medic_con , donoremail , telephone , cr_date) VALUES('$token' , (SELECT hemail FROM crud WHERE id='$token') , (SELECT hospital_name FROM crud WHERE id='$token') , (SELECT bloodgroup FROM crud WHERE id='$token') , (SELECT name FROM donators WHERE email='$donor') , (SELECT gender FROM donators WHERE email='$donor') , '$weight' , '$medi' , '$donor' , '$tele' , '$date')") or die($mysqli->error);
    mail($to,$subject,$mess);

header("location:userprofile.php");
}
}
?>
