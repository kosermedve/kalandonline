<?php
    session_start();

    function lgdin(){
        if (isset($_SESSION['user_name'])){
            return true;
        }
        return false;
    };

    function perm(){
        if ($_SESSION['perm'] == "true"){
            return true;
        }
        return false;
    };

?>
<!DOCTYPE html>
<html mlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <title>
            Kaland Játék Kockázat a Neten
        </title>


        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <script src="js/jquery-1.11.2.min.js"></script>

        <script src="js/login-controll.js"></script>
        <script src="js/reg-controll.js"></script>
        <script src="js/user-conttroll.js"></script>
        <script src="js/news-controll.js"></script>
        <script src="js/mkgame-controll.js"></script>
        <script src="js/cookie-controll.js"></script>
        <script src="js/save-load-controll.js"></script>

        <script src="js/bootstrap.js"></script>
        <script src="js/tinymce/tinymce.min.js"></script>

    </head>
    <body>

        <div id="content" class="container">
            <?php
            include 'navbar.php';
            ?>
            <?php
                include 'navigation.php';
            ?>
        </div>

        <div id="shadow" class="popup">
        </div>
    </body>
</html>