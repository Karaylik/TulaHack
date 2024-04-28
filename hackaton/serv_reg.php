<?php
require  'conn.php';
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_EMAIL);
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$name2   = filter_var(trim($_POST['name2']),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$name3   = filter_var(trim($_POST['name3']),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$phone = filter_var(trim($_POST['phone']),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pass = md5($pass);

$result = $mysql->query("SELECT * FROM `users` WHERE `login`= '$login'") ;

$user = $result->fetch_assoc();


if(count((array)$user) ==0){
    $mysql -> query("INSERT INTO `users` (`login`, `pass` ,`name`, `SecondName`, `patronymic`, `PhoneNumber`) VALUES('$login','$pass','$name','$name2', '$name3', '$phone')");
    $_SESSION['email'] = $login;
    print_r("Успех");
}else{
    print_r("Провал");
}
$mysql->close();
