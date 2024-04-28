<?php
session_start();
require  'conn.php';
$name = $_POST['name'];
$address = $_POST['addres'];
$phone = $_POST['num'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

$mysql -> query("INSERT INTO `aplic` (`NameOrg`, `Adress` ,`Phone`, `Email`, `info`) VALUES('$name','$address','$phone','$email', '$feedback')");

$mysql->close();
?>