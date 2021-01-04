<?php
session_start();
$mysqli = new mysqli ('localhost', 'root' , '1234' , 'bloodbank') or die (mysqli_error($mysqli));

if(isset($_POST['submit'])) {

$donor = $_POST['staticemail'];
$token = $_POST['token'];
$tele = $_POST['teleno'];
$weight = $_POST['weight'];
$medi = $_POST['medic'];
$date = date('y-m-d h:i:s');


$result = $mysqli ->query("SELECT*FROM acceptreq WHERE donoremail='$donor'");
$num = mysqli_num_rows($result);

if($num == 2){
    $_SESSION['message01']="Already Accepted";
    header("location:userprofile.php");
}
else{
    $_SESSION['message02']="successfully accepted";
    $mysqli->query("INSERT INTO acceptreq(token , hospitalname , bloodGroup , donorName , gender , weight , medic_con , donoremail , telephone , cr_date) VALUES('$token' , (SELECT hospital_name FROM crud WHERE id='$token') , (SELECT bloodgroup FROM crud WHERE id='$token') , (SELECT name FROM donators WHERE email='$donor') , (SELECT gender FROM donators WHERE email='$donor') , '$weight' , '$medi' , '$donor' , '$tele' , '$date')") or die($mysqli->error);

header("location:userprofile.php");
}
}
?>
