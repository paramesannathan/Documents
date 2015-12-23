<?php
require("config.php");
require("functions.php");
require("header.php");
$prodcatsql = "SELECT * FROM produkte WHERE cat_id = " . $_GET['id'] . ";";
$prodcatres = mysql_query($prodcatsql);
$numrows = mysql_num_rows($prodcatres);
if($numrows == 0)
{
echo "<h1>Keine Produkte</h1>";
echo "Es gibt keine Produkte in dieser Kategorie.";
}
else
{
echo "<table cellpadding='10'>";
while($prodrow = mysql_fetch_assoc($prodcatres))
{
echo "<tr>";
if(empty($prodrow['image'])) {
echo "<td><img
src='./productimages/dummy.jpg' alt='". $prodrow['name'] . "'></td>";
}
else {
echo "<td><img src='./productimages/" . $prodrow['image']. "' alt='". $prodrow['name'] . "'></td>";
}
echo "<td>";
echo "<h2>" . $prodrow['name'] . "</h2>";
echo "<p>" . $prodrow['beschreibung'];
echo "<p><strong>Preis: CHF". sprintf('%.2f', $prodrow['preis']) . "</strong>";
echo "<p>[<a href='addtobasket.php?id=". $prodrow['id'] . "'>kaufen</a>]";
echo "</td>";
echo "</tr>";
}
echo "</table>";
}
require("footer.php");
?>
