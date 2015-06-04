<?php
    $page = $_GET['nav'];
    switch ($page){
    case "reg":
        include ('./usr_admin/register.php');
        break;

    case "udata":
            include('./usr_admin/userdata.php');
            break;

    case "usrl":
        if ( lgdin() && perm() ){
            include ('./usr_admin/userlist.php');
        }else{
            header('Location: http://kjkonline.hol.es/');
        }
        break;

    case "addusr":
        if (  lgdin() && perm() ){
            include('./usr_admin/newuser.php');
        }else{
            header('Location: http://kjkonline.hol.es/');
        }
        break;

    case "addpost":
        if ( lgdin() && perm()){
            include('./news_admin/postnews.php');
        }else{
            header('Location: http://kjkonline.hol.es/');
        }
        break;

    case "addgame":
        if ( lgdin() && perm()){
            include('./game_admin/gameupload.php');
        }else{
            header('Location: http://kjkonline.hol.es/');
        }
        break;

        case "listnews":
            if ( lgdin() && perm()){
                include('news_admin/listnews.php');
            }else{
                header('Location: http://kjkonline.hol.es/');
            }
            break;

    case "kahre":
        include('./kahre/index.php');
        break;

    default:
            include'news.php';

}