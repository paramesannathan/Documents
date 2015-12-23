<?php
session_start();
require("config.php");
$statussql = "SELECT status FROM bestellungen WHERE id = " .$_SESSION['SESS_AUFTRAG'];
$statusres = mysql_query($statussql);
$statusrow = mysql_fetch_assoc($statusres);
$status = $statusrow['status'];
if($status == 1) {
header("Location: " . $config_basedir . "checkout-pay.php");
}
if($status >= 2) {
header("Location: " . $config_basedir);
}

if(isset($_POST['submit']))
{
if(isset($_SESSION['SESS_LOGGEDIN']))
{
if($_POST['addselecBox'] == 2)
{
if(empty($_POST['vornameBOX']) ||
empty($_POST['nachnameBox']) ||
empty($_POST['strasseBox']) ||
empty($_POST['hasunummerBox']) ||
empty($_POST['plzBox']) ||
empty($_POST['ortBox']) ||
empty($_POST['telBox']) ||
empty($_POST['emailBox']))
{
header("Location: " . $basedir . "checkoutaddress.php?error=1");
exit;
}

$addsql = "INSERT INTO lieferungsadresse(vorname, nachname, strasse, hausnummer, plz, ort, tel, email)VALUES('" . strip_tags(addslashes( $_POST['vornameBOX'])) . "', '" . strip_tags(addslashes( $_POST['nachnameBox'])) . "', '" . strip_tags(addslashes( $_POST['strasseBox'])) . "', '" . strip_tags(addslashes( $_POST['hasunummerBox'])) . "', '" . strip_tags(addslashes( $_POST['plzBox'])) . "', '" . strip_tags(addslashes( $_POST['ortBox'])) . "', '" . strip_tags(addslashes(
$_POST['telBox'])) . "', '" . strip_tags(addslashes($_POST['emailBox'])) . "')";
mysql_query($addsql);
$setaddsql = "UPDATE bestellungen SET lieferung_add_id = " . mysql_insert_id() . ", status = 1 WHERE id = " . $_SESSION['SESS_AUFTRAG'];
mysql_query($setaddsql);
header("Location: " . $config_basedir . "checkout-pay.php");
}
else
{
$custsql = "UPDATE bestellungen SET lieferung_add_id = 0, status = 1 WHERE id = " . $_SESSION['SESS_AUFTRAG'];
mysql_query($custsql);
header("Location: " . $config_basedir . "checkout-pay.php");
}
}
else
{
if(empty($_POST['vornameBOX']) ||
empty($_POST['nachnameBox']) ||
empty($_POST['strasseBox']) ||
empty($_POST['hasunummerBox']) ||
empty($_POST['plzBox']) ||
empty($_POST['ortBox']) ||
empty($_POST['telBox']) ||
empty($_POST['emailBox']))
{
header("Location: " . "checkout-address.php?error=1");
exit;
}
$addsql = "INSERT INTO lieferungsadresse(vorname, nachname, strasse, hausnummer, plz, ort, tel, email) VALUES('" . $_POST['vornameBOX'] . "', '" . $_POST['nachnameBox'] . "', '" . $_POST['strasseBox'] . "', '" . $_POST['hasunummerBox'] . "', '" . $_POST['plzBox'] . "', '" . $_POST['ortBox'] . "', '" . $_POST['telBox'] . "', '" . $_POST['emailBox'] . "')";
mysql_query($addsql);
$setaddsql = "UPDATE bestellungen SET lieferung_add_id = " . mysql_insert_id() . ", status = 1 WHERE session = '" . session_id() . "'";
mysql_query($setaddsql);
header("Location: " . $config_basedir . "checkout-pay.php");
}
}

else
{

require("header.php");
echo "<h1>Bitte geben sie Ihre Lieferadresse ein</h1>";
if(isset($_GET['error']) == TRUE) {
echo "<strong>Bitte füllen Sie die fehlenden
Informationen.</strong>";
}
echo "<form action='".$_SERVER['SCRIPT_NAME'] . "' method='POST'>";
if(isset($_SESSION['SESS_LOGGEDIN']))
{
?>
<input type="radio" name="addselecBox"
value="1" checked>Verwenden Sie die Adresse von meinem
Konto</input><br>
<input type="radio" name="addselecBox"
value="2">Verwenden Sie unter der Adresse:</input>
<?php
}
?>
<table>
<tr>
<td>Vorname:</td>
<td><input type="text" name="vornameBOX"></td>
</tr>
<tr>
<td>Nachname:</td>
<td><input type="text" name="nachnameBox"></td>
</tr>
<tr>
<td>Strasse:</td>
<td><input type="text" name="strasseBox"></td>
</tr>
<tr>
<td>Hausnummer:</td>
<td><input type="text" name="hasunummerBox"></td>
</tr>
<tr>
<td>PLZ:</td>
<td><input type="text" name="plzBox"></td>
</tr>
<tr>
<td>Ort:</td>
<td><input type="text" name="ortBox"></td>
</tr>
<tr>
<td>Ttelefonnummer:</td>
<td><input type="text" name="telBox"></td>
</tr>
<tr>
<td>E-Mail</td>
<td><input type="text" name="emailBox"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Adresse hinzufügen"></td>
</tr>
</table>
</form>
<?php
}
require("footer.php");
?>