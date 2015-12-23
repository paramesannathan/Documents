<?php

function pf_validate_number($value, $function, $redirect) {
if(isset($value) == TRUE) {
if(is_numeric($value) == FALSE) {
$error = 1;
}
if(@$error == 1) {
header("Location: " . $redirect);
}
else {
$final = $value;
}
}
else {
if($function == 'redirect') {
header("Location: " . $redirect);
}
if($function == "value") {
$final = 0;
}
}
return $final;
}


function showcart()
{
if(isset($_SESSION['SESS_AUFTRAG']))
{
if(isset($_SESSION['SESS_LOGGEDIN']))
{
$custsql = "SELECT id, status from bestellungen WHERE kunden_id = ". $_SESSION['SESS_USERID']. " AND status < 2;";
$custres = mysql_query($custsql)or die(mysql_error());;
$custrow = mysql_fetch_assoc($custres);

$itemssql = "SELECT produkte.*, auftrag.*, auftrag.id AS itemid FROM produkte, auftrag WHERE auftrag.produkt_id =produkte.id AND auftrag_id = " . $custrow['id'];
$itemsres = mysql_query($itemssql)or die(mysql_error());;
$itemnumrows = mysql_num_rows($itemsres);
}
else
{
$custsql = "SELECT id, status from bestellungen WHERE session = '" . session_id(). "' AND status < 2;";
$custres = mysql_query($custsql)or die(mysql_error());;
$custrow = mysql_fetch_assoc($custres);
$itemssql = "SELECT produkte.*, auftrag.*, auftrag.id AS itemid FROM produkte, auftrag WHERE auftrag.produkt_id = produkte.id AND auftrag_id = " . $custrow['id'];
$itemsres = mysql_query($itemssql)or die(mysql_error());;
$itemnumrows = mysql_num_rows($itemsres);

}
}
else
{
$itemnumrows = 0;
}
if($itemnumrows == 0)
{
echo "Sie haben noch nichts in Ihren Warenkorb hinzugefügt.";
}

else
{
echo "<table cellpadding='10'>";
echo "<tr>";
echo "<td></td>";
echo "<td><strong>Artikel</strong></td>";
echo "<td><strong>menge</strong></td>";
echo "<td><strong>Einheitspreis</strong></td>";
echo "<td><strong>Total Preis</strong></td>";
echo "<td></td>";
echo "</tr>";
while($itemsrow = mysql_fetch_assoc($itemsres))
{
$mengetotal = $itemsrow['preis'] * $itemsrow['menge'];
echo "<tr>";
if(empty($itemsrow['image'])) {
echo "<td><img src='productimages/dummy.jpg' width='50' alt='" . $itemsrow['name'] . "'></td>";
}
else {
echo "<td><img src='productimages/" .$itemsrow['image'] . "' width='50' alt='". $itemsrow['name'] . "'></td>";
}
echo "<td>" . $itemsrow['name'] . "</td>";
echo "<td>" . $itemsrow['menge'] . "</td>";
echo "<td><strong>CHF" . sprintf('%.2f', $itemsrow['preis']) . "</strong></td>";
echo "<td><strong>CHF". sprintf('%.2f', $mengetotal) . "</strong></td>";
echo "<td>[<a href='delete.php?id=". $itemsrow['itemid'] . "'>X</a>]</td>";
echo "</tr>";
@$total = $total + $mengetotal;
$totalsql = "UPDATE bestellungen SET total = ". $total . " WHERE id = ". $_SESSION['SESS_AUFTRAG'];
$totalres = mysql_query($totalsql)or die(mysql_error());;
}
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td>TOTAL</td>";
echo "<td><strong>CHF". sprintf('%.2f', $total) . "</strong></td>";
echo "<td></td>";
echo "</tr>";
echo "</table>";
echo "<p><a href='index.php'>Zurück</a></p>";
}
}
?>
