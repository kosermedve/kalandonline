<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET");

include_once("../connection.php");

if (isset($_POST["r_user"])){
    $escUname = mysql_real_escape_string($_POST["r_user"]);
    $escEmail = mysql_real_escape_string($_POST["r_email"]);
    $escPass = mysql_real_escape_string($_POST["r_pass"]);

    $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    $saltedPass = $escPass . $salt;
    $hashPass = hash('sha256', $saltedPass);


    $perm = "false";
    $query = "INSERT INTO felhasznalok (id, username, email, passwd, salt, perm) VALUES (DEFAULT , '$escUname', '$escEmail', '$hashPass', '$salt', '$perm');";

}elseif(isset($_POST["a_user"])){
    $escUname = mysql_real_escape_string($_POST["a_user"]);
    $escEmail = mysql_real_escape_string($_POST["a_email"]);
    $EscPass = mysql_real_escape_string($_POST["a_pass"]);

    if ($_POST['a_perm'] == "on"){
        $perm = "true";
    }else{
        $perm = "false";
    }

    $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    $saltedPass = $EscPass . $salt;
    $hashPass = hash('sha256', $saltedPass);

    $query = "INSERT INTO felhasznalok (id, username, email, passwd, salt, perm) VALUES (DEFAULT , '$escUname', '$escEmail', '$hashPass', '$salt', '$perm');";
}


if (mysql_query($query)){
    echo 'true';
}else{
    echo 'false';
}