<?php
include_once("../connection.php");

$id = $_POST["id"];
$query = "UPDATE felhasznalok SET ";

if ($_POST["eusername"] != ""){
    $escUname = mysql_real_escape_string($_POST["eusername"]);
    $query = $query . "username='$escUname', ";
}

if ($_POST["epasswd"] != ""){
    $escPass = mysql_real_escape_string($_POST["epasswd"]);
    $salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
    $saltedPass = $escPass . $salt;
    $hashPass = hash('sha256', $saltedPass);

    $query = $query . "passwd='$hashPass', salt='$salt', ";
}

if ($_POST["eemail"] != ""){
    $escEmail = mysql_real_escape_string($_POST["eemail"]);

    $query = $query . "email='$escEmail', ";
}

if($_POST["eperm"] !=""){
    $eperm = mysql_real_escape_string($_POST["eperm"]);
    $query = $query . "perm='$eperm'";
}
$query = $query ." WHERE id='$id';";

mysql_query($query)or die(mysql_error());