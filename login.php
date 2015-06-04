<?php
include_once("connection.php");

session_start();
$escName = mysql_real_escape_string($_POST['username']);
$escPass = mysql_real_escape_string($_POST['password']);


$saltQuery = "SELECT `salt` FROM `felhasznalok` WHERE `username` = '$escName';";
$result = mysql_query($saltQuery);

$row = mysql_fetch_assoc($result);
$salt = $row['salt'];

$saltedPass = $escPass . $salt;
$hashPass = hash('sha256', $saltedPass);

$query = "select * from felhasznalok where username = '$escName' and passwd = '$hashPass'; ";

$result = mysql_query($query)or die(mysql_error());

$num_row = mysql_num_rows($result);
$row=mysql_fetch_array($result);

if( $num_row >= 1 ) {
    $_SESSION['user_name']=$row['username'];
    $_SESSION['perm']=$row['perm'];
    echo "true";
}
else{
    echo "false";
}
mysql_close();
?>