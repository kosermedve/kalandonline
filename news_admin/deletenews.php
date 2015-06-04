<?php

include_once("../connection.php");

$id = mysql_real_escape_string($_POST["id"]);

$query = "DELETE FROM hirek WHERE id='$id'";

$result = mysql_query($query)or die(mysql_error());

$num_row = mysql_num_rows($result);