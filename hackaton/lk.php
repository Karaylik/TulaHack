<?php
session_start();
require  'asset/php/conn.php';
$res = $_SESSION['email'];
$personal = $mysql->query("SELECT * FROM `users` WHERE `login`='$res'")->fetch_assoc();
$orders = $mysql->query("SELECT * FROM `Orders` WHERE `UserEmail`='$res'")->fetch_all();

function checkDateTime($dateStr, $timeStr) {
    // Получаем текущую дату и время
    $currentDateTime = new DateTime();
    
    // Разбираем дату и время из строки
    $targetDateTime = DateTime::createFromFormat('Y-m-d H:i:s', "$dateStr $timeStr");
    

    // Сравниваем с текущей датой и временем
    if ($currentDateTime > $targetDateTime) {
        return(1);
    } elseif ($currentDateTime < $targetDateTime) {
        return(0);
    } else {
        return(0);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style/lk.css">
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
         <div id="content">
         <div class="container">
         <div class="container">
            <h1>Личные данные</h1>
                <a href="" onclick="exit()" class="out">Выход</a>
            <label for="fio">Имя: <?php echo $personal['name'];?></label>
        </div>
        <div class="container">
            <label for="email">Фамилия: <?php echo $personal['SecondName'];?></label>
        </div>
        <div class="container">
            <label for="email">Отчество:<?php echo $personal['patronymic'];?></label>
        </div>
        <div class="container">
            <label for="email">Email: <?php echo $personal['login'];?></label>
        </div>
        <div class="container">
          <label for="phone">Телефон: <?php echo $personal['PhoneNumber'];?></label>
        </div>
    <div class="wrap">
        <div class="reser-l">
            Текущие бронирования
        </div>
        <div id="reserv_show">
             <?php
                for ($b = 0; $b<count($orders); $b++) {
                  
                    if(checkDateTime($orders[$b][3],$orders[$b][2]) != 1){
                        $fix = $orders[$b][5];
                        $rest = $mysql->query("SELECT * FROM `rest` WHERE `id`='$fix'")->fetch_assoc();
                        
                        echo"
                        <table>
                            <tr>
                                <td class=\"bold_td\" >Ресторан</td>
                                <td>".$rest["NameRest"]."</td>
                            </tr>
                            <tr>
                                <td class=\"bold_td\">Дата</td>
                                <td>".$orders[$b][3]."</td>
                            </tr>
                            <tr>
                                <td class=\"bold_td\">Время</td>
                                <td>".$orders[$b][2]."</td>
                            </tr>
                        </table>
                        ";
                    }
                }
            ?>
            
        </div>
    </div>
    <div class="wrap2">
    <div class="booking"></div>
    <div class="reser"></div>
    </div>
    </div>
         </div>
        
      <?php
        require_once "footer.php";
        $mysql->close();
    ?>
   <script src="asset/js/exit.js"></script>
</body>
</html>