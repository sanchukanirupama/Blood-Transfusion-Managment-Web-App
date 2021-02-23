<?php 
include('database.php');

$pass = md5($_POST['password']);
$email = $_POST['email'];
$select = $_POST["select"];
$mail = $_SESSION["email"];

if($select == "1") {
$s1 = $mysqli ->query("SELECT * from donators where email = '$email' && password = '$pass'");
$nam  = $mysqli ->query("SELECT name from donators where email = '$email'");

$_SESSION['user_name'] = $nam;
$num1 = mysqli_num_rows($s1);

if($num1 == 1) {
    session_start();
    $_SESSION['user_email'] = $email;  
    header('location:userprofile.php');
}else {
    session_start();
    $_SESSION['messagex']="wrong user name password";
    header('location:login.php');
}
}
else{
    $s2 = $mysqli -> query("SELECT*from hospitle where hospitalemail = '$email' && hospitalpass = '$pass'");
    $num2 = mysqli_num_rows($s2);
    
    if($num2 == 1) {
        session_start();
        $_SESSION['user_email'] = $email; 
        header('location:home.php');
    }else {
        session_start();
        $_SESSION['messagex']="wrong user name password";
        header('location:login.php');
    }
}
?>
