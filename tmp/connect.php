<?php
$host="localhost";
$user="root";
$pwd="abc12";
$db="rwsSys";

$link = mysql_connect($host, $user, $pwd);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($db);
?>
