<?php
session_start();
require  'asset/php/conn.php';

$mysql->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style/contact.css">
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
     <div class="container">
        <a class="txt">Заполните форму обратной связи</a>
            <label for="name">Название организации:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="addres">Адресс:</label><br>
            <input type="text" id="addres" name="addres"><br>
            <label for="num">Номер телефона:</label><br>
            <input type="text" id="num" name="num"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="feedback">Доп. информация:</label><br>
            <textarea id="feedback" name="feedback"></textarea><br> <br>
            <a href="#" id="submitBtn" class="trow">Отправить</a>
    </div>
     </div>
     <?php
        require_once "footer.php";
    ?>
    <script src="asset/js/contact.js"></script>
</body>
</html>