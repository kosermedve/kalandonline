<?php
session_start();
include("../connection.php");
if (isset($_POST["save"])){
    $sName = mysql_real_escape_string($_SESSION["user_name"]);
    $sPage = mysql_real_escape_string($_COOKIE["cPage"]);
    $sDex = mysql_real_escape_string($_COOKIE["cDex"]);
    $sDexAkt = mysql_real_escape_string($_COOKIE["cDexAkt"]);
    $sHp = mysql_real_escape_string($_COOKIE["cHp"]);
    $sHpAkt = mysql_real_escape_string($_COOKIE["cHpAkt"]);
    $sLuck = mysql_real_escape_string($_COOKIE["cLuck"]);
    $sLuckAkt = mysql_real_escape_string($_COOKIE["cLuckAkt"]);
    $sFood = mysql_real_escape_string($_COOKIE["cFood"]);
    $sGear = mysql_real_escape_string($_COOKIE["cGear"]);
    $sGold = mysql_real_escape_string($_COOKIE["cGold"]);
    $sStuff = mysql_real_escape_string($_COOKIE["cStuff"]);
    $sNote = mysql_real_escape_string($_COOKIE["cNote"]);
    $sDate = date("Y.m.d G:i:s");

    $query = "SELECT * FROM gamesave WHERE sName='$sName';";
    $result = mysql_query($query)or die(mysql_error());
    mysql_close($dbhandle);
    $num_row = mysql_num_rows($result);

    if( $num_row >= 1 ) {
        echo 'van már mentés';
    }
    else{
        $query = "INSERT INTO gamesave (id, sName, story, page, dex, dexAkt, hp, hpAkt, luck, luckAkt,food, gear, gold, stuff, note, sDate)
                  VALUES (DEFAULT , '$sName','kahre','$sPage','$sDex', '$sDexAkt', '$sHp', '$sHpAkt', '$sLuck','$sLuckAkt', '$sFood', '$sGear', '$sGold', '$sStuff', '$sNote', '$sDate');";
        $result = mysql_query($query) or die(mysql_error());
        echo 'siker';
    }

}
