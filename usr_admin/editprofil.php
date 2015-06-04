<?php
include_once("../connection.php");


if (isset($_POST["email"])){
    $id = $_POST["id"];
    $escEmail = mysql_real_escape_string($_POST["email"]);

    $query = "UPDATE felhasznalok SET email='$escEmail' WHERE id='$id';";
    $result = mysql_query($query)or die(mysql_error());

    echo "true";
}

if (isset($_POST["passwd"])){
    $id = $_POST["id"];
    $escPass = mysql_real_escape_string($_POST["passwd"]);
    $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    $saltedPass = $escPass . $salt;
    $hashPass = hash('sha256', $saltedPass);

    $query = "UPDATE felhasznalok SET passwd='$hashPass', salt='$salt' WHERE id='$id';";
    mysql_query($query)or die(mysql_error());
    echo "true";
}
