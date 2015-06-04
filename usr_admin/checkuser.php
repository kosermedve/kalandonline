<?php
include_once("../connection.php");

$id = mysql_real_escape_string($_POST['id']);
$escPass = mysql_real_escape_string($_POST['password']);

$saltQuery = "SELECT `salt` FROM `felhasznalok` WHERE `id` = '$id';";
$result = mysql_query($saltQuery);

$row = mysql_fetch_assoc($result);
$salt = $row['salt'];

$saltedPass = $escPass . $salt;
$hashPass = hash('sha256', $saltedPass);

$query = "select * from felhasznalok where id = '$id' and passwd = '$hashPass'; ";

$result = mysql_query($query)or die(mysql_error());

$num_row = mysql_num_rows($result);
$row=mysql_fetch_array($result);

if( $num_row >= 1 ) {
    echo "true";
}
else{
    echo "false";
}