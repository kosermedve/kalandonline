<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");

include_once("../connection.php");

if (isset($_POST["nBody"])){
    $escTitle = mysql_real_escape_string($_POST["nTitle"]);
    $escBody = mysql_real_escape_string($_POST["nBody"]);
    $ndate = date("Y-m-d");

    if ($escTitle == ""){
        $escTitle = "Cím nélkül";
    }

    $query = "INSERT INTO hirek (id, title, body, ndate) VALUES (DEFAULT, '$escTitle', '$escBody', '$ndate');";

    if (mysql_query($query)){
        echo 'true';
    }else{
        die('Could not enter data: ' . mysql_error());
    }
}