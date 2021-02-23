<?php
include('database.php');
$mysqli->query("DELETE*FROM crud WHERE req_time < DATE_SUB(NOW() , INTERVAL 1 DAY)");
?>