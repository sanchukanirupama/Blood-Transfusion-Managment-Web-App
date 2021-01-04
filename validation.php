<?php 

$con  = mysqli_connect('localhost', 'root' , '1234');

mysqli_select_db($con, 'bloodbank');

$pass = md5($_POST['password']);
$email = $_POST['email'];
$select = $_POST["select"];
$mail = $_SESSION["email"];

if($select == "1") {
$s1 = " select * from donators where email = '$email' && password = '$pass'";
$nam  = "select name from donators where email = '$email' ";

$nama = mysqli_query($con, $nam);
$_SESSION['user_name'] = $nama;
$result1 = mysqli_query($con, $s1);
$num1 = mysqli_num_rows($result1);

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
    $s2 = " select * from hospitle where hospitalemail = '$email' && hospitalpass = '$pass'";

    $result2 = mysqli_query($con, $s2);
    $num2 = mysqli_num_rows($result2);
    
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
