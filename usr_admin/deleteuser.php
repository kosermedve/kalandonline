<?php

include_once("../connection.php");

$id = $_POST["id"];

$query = "DELETE FROM felhasznalok WHERE id='$id'";

$result = mysql_query($query)or die(mysql_error());

$num_row = mysql_num_rows($result);