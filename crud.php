<?php

session_start();
include('database.php');

if(isset($_POST['save'])){

$name = $_POST['hname'];
$district = $_POST['district'];
$mail = $_SESSION['user_email'];
$blood = $_POST['bgroup'];
$dis = $_POST['discription'];
$today = date("F j, Y, g:i a");

$mysqli ->query("INSERT INTO crud (hemail , hospital_name , district , bloodgroup , req_time ,  discription) VALUES ('$mail' , '$name' , '$district' , '$blood' , '$today' , '$dis')") or
die($mysqli->error);
include('mm.php');
$_SESSION['message']="Request has been Published!";

header("location:home.php");

}

if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM crud WHERE id=$id") or die($mysqli->error);

    $_SESSION['message0']="Request has been deleted!";
    

    header("location:home.php");
}
    
?>
