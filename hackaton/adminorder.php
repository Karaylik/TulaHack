<?php
session_start();
require  'asset/php/conn.php';
if ($_SESSION['email'] != 'OverMape') {
    // Очищаем буфер вывода
    ob_clean();

    // Отправляем заголовки для пустой страницы
    header("Content-Type: text/html; charset=utf-8");
    header("Content-Length: 0");
    header("Connection: close");

    // Закрываем сессию
    session_write_close();

    // Остановить загрузку и выйти из скрипта
    exit();
}
$rest = $mysql->query("SELECT * FROM `aplic`")->fetch_all();

$mysql->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style/admin.css">
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
      <table>
        <thead>
            <tr>
                <th>Организация</th>
                <th>Адрес</th>
                <th>Телефон</th>
                <th>Почта</th>
                <th>Дополнительная информация</th>
            </tr>
        </thead>
        <tbody>
        <?php
                for ($b = 0; $b<count($rest); $b++) {
                    echo "
                    <tr>
                        <td>".$rest[$b][1]."</td>
                        <td>".$rest[$b][5]."</td>
                        <td>".$rest[$b][2]."</td>
                        <td>".$rest[$b][3]."</td>
                        <td>".$rest[$b][4]."</td>
                    </tr>
                    ";
                }
                ?>
            
        </tbody>
    </table>
    </div>
       </div>
       <?php
        require_once "footer.php";
    ?>
</body>
</html>