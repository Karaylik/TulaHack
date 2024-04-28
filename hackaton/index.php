<?php
session_start();
require  'asset/php/conn.php';
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
    <div class="MainMenu">
        <div>
          <h1>Сервис онлайн-бронирования столиков</h1>
        </div>
        <div>
          <button class="btn-new"><a href="list.php"> ЗАБРОНИРОВАТЬ СТОЛ </a></button>
        </div>
    </div>
    <div id="all_content">
      <div id="in_index_content">
      <div id="first">
        <img src="asset/img/L.png" alt="">
      </div>
      <div id="text_in">Забронируй лучшие моменты за столиком с нами!</div>
      <div id="second">
      <img src="asset/img/f.png" alt="">
      </div>
      </div>
    </div>
      </div>
      <?php
        require_once "footer.php";
    ?>
   
</body>
</html>