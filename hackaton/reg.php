<?php
session_start();
require  'asset/php/conn.php';

$res = $_SESSION['email'];
$personal = $mysql->query("SELECT * FROM `rest`")->fetch_assoc();
$mysql->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style/style.css">
    <title>Document</title>
</head>
<body>
    <?php
           if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            require_once "header.php";
        } else {
            require_once "header_noauth.php";
        }

    ?>
    <div id="all_content">
            <div id="slide">
        <h1>Авторизация</h1>
        <h1>Регистрация</h1>
        </div>
        <div id="content">
        <div id="left_content">

            <div id="login">
                <div class="fix">
                    <span>Email/Почта</span>
                </div>
                <div id="input_login_div">
                    <input id="login_input_enter" type="text" name="login">
                </div>
            </div>
            <div id="password">
                <div class="fix">
                    <span>Пароль</span>
                </div>
                <div id="password_and_checkbox">
                    <input id="password_input_enter" type="password" name="pass">
                </div>
            </div>
            <div id="all_button">
                <button class="btn-new" onclick="registr()">Войти</button>
            </div>
        </div>
        <div id="right_content">
            <div id="login_reg">
                <span>Имя</span>
                <input id="name_input" type="text" name="name"> 
                </div>
                <div id="login_reg">
                <span>Фамилия</span>
                <input id="name2_input" type="text" name="name2"> 
                </div>
                <div id="login_reg">
                <span>Отчество</span>
                <input id="name3_input" type="text" name="name3"> 
                </div>
                <div id="login_reg">
                <span>Номер телефона</span>
                <input id="phone_input" type="text" name="phone"> 
                </div>
                <div id="login_reg">
                <span>Email/Почта</span>
                <input id="login_input" type="email" name="login"> 
                </div>
                <div id="login_reg">
                <span>Пароль</span>
                <input id="pass_input" type="password" name="pass"> 
                </div>
                <button class="btn-new" onclick="realreg();">Регистрация</button>
        </div>
        </div>
    </div>
    <?php
        require_once "footer.php";
    ?>
    <script src="asset/js/script.js"></script>
</body>
</html>