<?php

$autherr = 0;
require  'conn.php';
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_EMAIL);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pass = md5($pass);
$result = $mysql->query("SELECT * FROM `users` WHERE `login`= '$login' AND `pass` = '$pass'  ") ;

$user = $result->fetch_assoc();

if(count((array)$user) ==0){
    echo "Пользователя нет";
    $mysql->close();
}
else{
    print_r("Пользователь есть");
    $_SESSION['email'] = $login;
    $mysql->close();
}