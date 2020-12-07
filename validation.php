<?php 

session_start();

$con  = mysqli_connect('localhost', 'root' , '1234');

mysqli_select_db($con, 'bloodbank');

$pass = md5($_POST['password']);
$email = $_POST['email'];
$select = $_POST["select"];
$mail = $_SESSION["email"];

if($select == "1") {
$s1 = " select * from donators where email = '$email' && password = '$pass'";
$nam  = "select name from donators where email = '$email' ";

$result1 = mysqli_query($con, $s1);
$nama = mysqli_query($con, $nam);
$num1 = mysqli_num_rows($result1);

if($num1 == 1) {
    $_SESSION['user_email'] = $email;
    header('location:userprofile.php');
}else {
    header('location:login.php');
}
}
else{
    $s2 = " select * from hospitle where hospitalemail = '$email' && hospitalpass = '$pass'";

    $result2 = mysqli_query($con, $s2);
    $num2 = mysqli_num_rows($result2);
    
    if($num2 == 1) {
        header('location:home.php');
    }else {
        header('location:login.php');
    }
}
?>
