<?php
session_start();
require('config.php');
require("header.php");
require("functions.php");
echo "<h1>Dein Warenkorb</h1>";
showcart();
if(isset($_SESSION['SESS_AUFTRAG'])) {
	$SESS_AUFTRAG=$_SESSION['SESS_AUFTRAG'];
$sql = "SELECT * FROM auftrag WHERE auftrag_id =$SESS_AUFTRAG";
$result = mysql_query($sql) or die(mysql_error());
$numrows = mysql_num_rows($result);
if($numrows >= 1) {
echo "<h2><a href='checkout-address.php'>Zur Kasse gehen</a></h2>";
}
}
require("footer.php");
?>
