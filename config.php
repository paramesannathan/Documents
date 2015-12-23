<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbdatabase = "online_shop";
$config_basedir = "http://localhost/online_shop/";
$config_sitename = "online_shop";
$db = mysql_connect($dbhost, $dbuser, $dbpassword) or die(mysql_error());
mysql_select_db($dbdatabase, $db) or die(mysql_error());
?>
