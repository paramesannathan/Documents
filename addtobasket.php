<?php
session_start();
require("config.php");
require("functions.php");
$prodsql = "SELECT * FROM produkte WHERE id = " . $_GET['id'] . ";";
$prodres = mysql_query($prodsql);
$numrows = mysql_num_rows($prodres);
$prodrow = mysql_fetch_assoc($prodres);
if($numrows == 0)
{
header("Location: " . $config_basedir);
}
else
{
if(isset($_POST['submit']))
{
if(isset($_SESSION['SESS_AUFTRAG']))
{
$itemsql = "INSERT INTO auftrag(auftrag_id,produkt_id, menge) VALUES(". $_SESSION['SESS_AUFTRAG'] . ", ". $_GET['id'] . ", ". $_POST['amountBox'] . ")";
mysql_query($itemsql) or die(mysql_error());
}
else
{
if(isset($_SESSION['SESS_LOGGEDIN']))
{
$sql = "INSERT INTO bestellungen(kunden_id,registered, date) VALUES(". $_SESSION['SESS_USERID'] . ", 1, NOW())";
mysql_query($sql) or die(mysql_error());
$_SESSION['SESS_AUFTRAG'] = mysql_insert_id();
$itemsql = "INSERT INTO auftrag(auftrag_id, produkt_id, menge) VALUES(". $_SESSION['SESS_AUFTRAG']. ", " . $_GET['id'] . ", ". $_POST['amountBox'] . ")";
mysql_query($itemsql) or die(mysql_error());
}
else
{
$sql = "INSERT INTO bestellungen(registered,date, session) VALUES(". "0, NOW(), '" . session_id() . "')";
mysql_query($sql) or die(mysql_error());
$_SESSION['SESS_AUFTRAG'] = mysql_insert_id();
$itemsql = "INSERT INTO auftrag(auftrag_id, produkt_id, menge) VALUES(". $_SESSION['SESS_AUFTRAG'] . ", " . $_GET['id'] . ", ". $_POST['amountBox'] . ")";
mysql_query($itemsql) or die(mysql_error());
}
}
$totalpreis = $prodrow['preis'] * $_POST['amountBox'] ;
$updsql = "UPDATE bestellungen SET total = total + ". $totalpreis . " WHERE id = ". $_SESSION['SESS_AUFTRAG'] . ";";
mysql_query($updsql) or die(mysql_error());
header("Location: " . $config_basedir . "showcart.php");
}
else
{
require("header.php");
echo "<form action='addtobasket.php?id=". $_GET['id'] . "' method='POST'>";
echo "<table cellpadding='10'>";
echo "<tr>";
if(empty($prodrow['image'])) {
echo "<td><imgsrc='productimages/dummy.jpg' width='50' alt='". $prodrow['name'] . "'></td>";
}
else {
echo "<td>
<img src='productimages/" . $prodrow['image']. "' width='50' alt='" . $prodrow['name']. "'></td>";
}
echo "<td>" . $prodrow['name'] . "</td>";
echo "<td>Auswahlmenge <select name='amountBox'>";
for($i=1;$i<=100;$i++)
{
echo "<option>" . $i . "</option>";
}
echo "</select></td>";
echo "<td><strong>CHF". sprintf('%.2f', $prodrow['preis']) . "</strong></td>";
echo "<td><input type='submit' name='submit' value='Zum warenkorb hinzufügen'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";
}
}
require("footer.php");
?>
