<?php
require  'conn.php';
$date = $_POST['date'];
$time = $_POST['time'];
$persons = $_POST['persons'];
$rest_id = $_POST['rest_id'];
$res = $_SESSION['email'];

$mysql -> query("INSERT INTO `Orders` (`UserEmail`, `Time` ,`Date`, `person`,`RestId`) VALUES('$res','$time','$date','$persons', '$rest_id')");

$mysql->close();
?>