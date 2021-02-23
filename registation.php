<?php 

session_start();
include('database.php');

$name = $_POST['user'];
$pass = md5($_POST['password']);
$email = $_POST['email'];
$id = $_POST['idnumber'];
$blood = $_POST['bloodgroup'];
$gender = $_POST['gender'];
$district = $_POST['district'];


$s = $mysqli ->query("SELECT * from donators where email = '$email'");
$num = mysqli_num_rows($s);

if($num == 1) {
    $_SESSION['message1']="You have been alrady register on this email!";
    header('location:login.php');
}
else {
    $reg = $mysqli ->query("INSERT into donators(name , password , email , gender , district , bloodgroup) values ('$name' , '$pass' , '$email' , '$gender' , '$district' , '$blood')");
    $_SESSION['message2']="Registation Successfull Thank You!";
    header('location:login.php');
}
?>