<?php
session_start();
require("config.php");
if(isset($_SESSION['SESS_LOGGEDIN'])) {
header("Location: " . $config_basedir);
}

if(isset($_POST['submit']))
{
$loginsql = "SELECT * FROM logins WHERE username = '" . $_POST['userBox']. "' AND password = '" . $_POST['passBox']. "'";
$loginres = mysql_query($loginsql);
$numrows = mysql_num_rows($loginres);
if($numrows == 1)
{
$loginrow = mysql_fetch_assoc($loginres);

$_SESSION['SESS_LOGGEDIN'] = 1;
$_SESSION['SESS_USERNAME'] = $loginrow['username'];
$_SESSION['SESS_USERID'] = $loginrow['id'];
$ordersql = "SELECT id FROM bestellungen WHERE kunden_id = " . $_SESSION['SESS_USERID'] . " AND status < 2";
$orderres = mysql_query($ordersql);
$orderrow = mysql_fetch_assoc($orderres);
$_SESSION['SESS_AUFTRAG'] = $orderrow['id'];
header("Location: " . $config_basedir);
}
else
{
header("Location: http://" .$_SERVER['HTTP_HOST']. $_SERVER['SCRIPT_NAME'] . "?error=1");
}
}

else
{
require("header.php");
?>
<h1>Kundenlogin</h1>
Bitte geben Sie Ihren Benutzernamen und Passwort, um anzumelden. Wenn Sie noch kein Benutzerkonto haben, können Sie sich hier <a href="register.php">registrieren</a>.
<p>
<?php
if(isset($_GET['error'])) {
echo "<strong>Falscher Benutzername oder Passwort</strong>";
}
?>

<form action="<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST">
<table>
<tr>
<td>Username</td>
<td><input type="textbox" name="userBox">
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="passBox">
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="login">
</tr>
</table>
</form>
<?php
}
require("footer.php");
?>
