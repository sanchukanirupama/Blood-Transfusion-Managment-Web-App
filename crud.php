<?php
session_start();
$mysqli = new mysqli ('localhost', 'root' , '1234' , 'bloodbank') or die (mysqli_error($mysqli));

if(isset($_POST['save'])){

$name = $_POST['hname'];
$district = $_POST['district'];
$blood = $_POST['bgroup'];

$mysqli ->query("INSERT INTO crud (hospital_name , district , bloodgroup) VALUES ('$name' , '$district' , '$blood')") or
die($mysqli->error);

$_SESSION['message']="Recode has been Published!";
$_SESSION['msg_type']="Success";

header("location:home.php");

}

if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM crud WHERE id=$id") or die($mysqli->error);

    
    $_SESSION['message']="Recode has been deleted!";
    $_SESSION['msg_type']="danger";

    header("location:home.php");
}

?>
