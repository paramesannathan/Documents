<?php
session_start();
require("config.php");
require("functions.php");

if(isset($_POST['paypalsubmit']))
{
$upsql = "UPDATE bestellungen SET status = 2, zahlung_type = 1 WHERE id = " . $_SESSION['SESS_AUFTRAG'];
$upres = mysql_query($upsql);
$itemssql = "SELECT total FROM bestellungen WHERE id = " . $_SESSION['SESS_AUFTRAG'];
$itemsres = mysql_query($itemssql);
$row = mysql_fetch_assoc($itemsres);

if($_SESSION['SESS_LOGGEDIN'])
{
unset($_SESSION['SESS_AUFTRAG']);
}
else
{
session_register("SESS_CHANGEID");
$_SESSION['SESS_CHANGEID'] = 1;
}
header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=info%40online%2eshop%2ech&lc=CH&button_subtype=services&no_note=0&currency_code=CHF&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHostedGuest");
}
else if(isset($_POST['chequesubmit']))
{
$upsql = "UPDATE bestellungen SET status = 2, zahlung_type = 2 WHERE id = ". $_SESSION['SESS_AUFTRAG'];
$upres = mysql_query($upsql);

if($_SESSION['SESS_LOGGEDIN'])
{
unset($_SESSION['SESS_AUFTRAG']);
}
else
{
session_register("SESS_CHANGEID");
$_SESSION['SESS_CHANGEID'] = 1;
}
require("header.php");
?>
<h1>Zahlung per Einzahlungsschein</h1>
<strong><?php echo $config_sitename; ?></strong>.
<p>
Einzahlungsadresse:
<p>
Tuning Shop,<br>
3000 Bern,<br>
Musterstrasse 20<br>
<?php
}
else
{
require("header.php");
echo "<h1>Zahlung</h1>";
showcart();
?>





<h2>Wählen Sie eine Zahlungsmethode</h2>
<form action='checkout-pay.php' method='POST'>
<table cellspacing=10>
<tr>
<td><h3>PayPal</h3></td>
<td>
PayPal-Konto erforderlich, um diese Zahlung zu nutzen.
</td>
<td><input type="submit" name="paypalsubmit" value="Mit PayPal bezahlen"></td>
</tr>
<tr>
<td><h3>Prüfen</h3></td>
<td>
Wenn Sie möchten, können Sie per Einzahlungsschein bezahlen.
</td>
<td><input type="submit" name="chequesubmit" value="Einzahlen"></td>
</tr>
</table>
</form>
<?php
}
require("footer.php");
?>
