<?php
session_start();
require  'asset/php/conn.php';
$rest = $mysql->query("SELECT * FROM `rest`")->fetch_all();

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
        <div class="backKartochki back_kartochki">
            <?php
                for ($b = 0; $b<count($rest); $b++) {
                    echo "<form class=\"form_list\" action=\"prod_get.php\" id=\"".$rest[$b][0]."formget\" method=\"get\">
                    <div class=\"MainBlockDiv\">
                    <img src=\"asset/img/".$rest[$b][4]."\"alt=\"\"/>
                    <div id=\"txt_block\">
                        <div id=\"left_block\">
                            <span>Название</span>
                            <span>Адрес</span>
                            <span>Кухня</span>
                        </div>
                        <div id=\"right_block\">
                            <span class=\"right_txt_block\">".$rest[$b][1]."</span>
                            <span class=\"right_txt_block\">".$rest[$b][2]."</span>
                            <span class=\"right_txt_block\">".$rest[$b][3]."</span>
                        </div>
                    </div>
                    <button type=\"submit\" class=\"btn-new\">ЗАБРОНИРОВАТЬ СТОЛ</button>
                    <input type=\"text\" name=\"prod_id\" value=\"".$rest[$b][0]."\" style=\"visibility: hidden;\">
                  </div>
                  
                    </form>";
                }
            ?>
        </div>
    </div>

<?php
    require_once "footer.php";
?>   
</body>
</html>