<h1>Produkte</h1>
<ul>
<?php
$catsql = "SELECT * FROM kategorien;";
$catres = mysql_query($catsql);
while($catrow = mysql_fetch_assoc($catres))
{
echo "<li><a href='" . $config_basedir. "products.php?id=" . $catrow['id'] . "'>". $catrow['name'] . "</a></li>";
}
?>
</ul>
