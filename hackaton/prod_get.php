<?php
session_start();
require  'asset/php/conn.php';
$res = $_GET["prod_id"];
$rest = $mysql->query("SELECT * FROM `rest_full` WHERE `id`='$res'")->fetch_assoc();
$rest_img = json_decode($rest["Img"],true);

$mysql->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/style/prod_get.css">
    <link rel="stylesheet" href="asset/style/style.css">
    <title>Document</title>
</head>
<body>
    <input type="hidden" id="rest_id" name="" value="<?php echo $res;?>">
<?php
           if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            require_once "header.php";
        } else {
            require_once "header_noauth.php";
        }
    ?>
     <div class="Prod_fix" id="all_content">
    <div class="slider">
        <div class="controls">
            <button class="control-btn prev-btn" onclick="prevSlide()"><</button>
            <button class="control-btn next-btn" onclick="nextSlide()">></button>
        </div>
        <div class="slides">
            <?php
                for ($b = 1; $b<=count($rest_img); $b++) {
                    echo" <div class=\"slide\"><img class=\"slide_img\" src=\"asset/img/rest/".$rest_img[$b]."\" alt=\"\"></div>";
                }
            ?>
        </div>
    </div>
        <div id="Bottom_content_text">
                <div id="first_txt">
                    <h1><?php echo $rest['NameRest'];?></h1>
                </div>
                <div id="second_txt">
                    <div id="left_second_txt">
                        <div id="in_left_side">
                            <?php
                                $today = date("Y-m-d");
                                $nextWeek = date("Y-m-d", strtotime("+1 week"));
                            ?>
                            <table>
                                <tr>
                                    <td>
                                        <label class="book_span" for="trip-start">Дата:</label>
                                    </td>
                                    <td class="td_input">
                                        <input class="book_input" type="date" id="start" name="trip-start" value="<?php echo $today;?>" min="<?php echo $today;?>" max="<?php echo  $nextWeek;?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="book_span" for="appt">Время:</label>
                                    </td>
                                    <td class="td_input">
                                        <input class="book_input" type="time" id="appt" name="appt" min="08:00" max="23:00" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        <label class="book_span" for="quantity">Персоны:</label>
                                    </td>
                                    <td class="td_input">
                                        <input class="book_input" type="number" id="quantity" name="quantity" min="1">
                                    </td>
                                </tr>
                            </table>
                            <?php
                                if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
                                     echo "
                                     <div class=\"btn_book\">
                                     <button onclick=\"sendBookingData();\"  class=\" btn-new\">ЗАБРОНИРОВАТЬ СТОЛ</button>
                                        </div>
                                     ";
                                } else {
                                    echo "
                                    <div class=\"btn_book\">
                                    <button   class=\" btn-new\">НЕОБХОДИМА РЕГИСТРАЦИЯ</button>
                                       </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                    <div id="right_second_txt">
                        <?php echo $rest['About'];?>
                    </div>
                </div>
        </div>
     </div>

     <?php
        require_once "footer.php";
    ?>
    <script src="asset/js/sendBookingData.js"></script>
    <script src="asset/js/slider.js"></script>
</body>
</html>