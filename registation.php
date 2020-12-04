<?php 

session_start();

$con  = mysqli_connect('localhost', 'root' , '1234');

mysqli_select_db($con, 'bloodbank');

$name = $_POST['user'];
$pass = md5($_POST['password']);
$email = $_POST['email'];
$id = $_POST['idnumber'];
$blood = $_POST['bloodgroup'];
$gender = $_POST['gender'];
$district = $_POST['district'];


$s = " select * from donators where email = '$email'";

$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1) {
    echo "Already Register on this Email Address";
}else {
    $reg = " insert into donators(name , password , email , gender , district , bloodgroup) values ('$name' , '$pass' , '$email' , '$gender' , '$district' , '$blood')";
    mysqli_query($con, $reg);
    echo "Registration Successful!";
}

?>
