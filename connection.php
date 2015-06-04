<?php
/*$mysql_host = "mysql9.000webhost.com";
$mysql_database = "a6129039_kaland";
$mysql_user = "a6129039_kaland";
$mysql_password = "quake3";*/

/*$mysql_host = "localhost";
$mysql_database = "kaland";
$mysql_user = "root";
$mysql_password = "egyedeM1268";*/

$mysql_host = 'mysql.hostinger.hu';
$mysql_database = 'u835950461_kjk';
$mysql_user = 'u835950461_kjk';
$mysql_password = 'quake3';


$dbhandle = mysql_connect($mysql_host,$mysql_user,$mysql_password) or die(mysql_error());

$selected = mysql_select_db($mysql_database) or die(mysql_error());