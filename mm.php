<?php
include('database.php');
$district = $_POST['district'];
$blood = $_POST['bgroup'];
$sub="test";
$body="test";
$to=$mysqli->query("SELECT*FROM donators WHERE bloodgroup='$blood' && district='$district'") or die($mysqli->error);

      while($row = $to->fetch_assoc()){
          mail($row['email'],$sub,$test);
      }

?>