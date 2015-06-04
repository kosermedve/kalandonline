<?php

include_once("connection.php");

if (isset($_POST['r_user'])){
    $username = $_POST['r_user'];
    $query = "SELECT * FROM felhasznalok WHERE username='$username'";
}

if(isset($_POST['r_email'])){
    $email = $_POST['r_email'];
    $query = "SELECT * FROM felhasznalok WHERE email = '$email'";
}


$result = mysql_query($query)or die(mysql_error());

$num_row = mysql_num_rows($result);

if( $num_row >= 1 ) {
    echo 'true';
}
else{
    echo 'false';
}