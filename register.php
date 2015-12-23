<?php
require("header.php");
?>
					<form action="registrieren.php" method="post">
					Dein Username:<br>
					<input type="text" size="24" maxlength="50"
					name="username"><br><br>
					
					Dein Passwort:<br>
					<input type="password" size="24" maxlength="50"
					name="password"><br><br>
					
					Passwort wiederholen:<br>
					<input type="password" size="24" maxlength="50"
					name="password2"><br><br>
					<a href="login.php">Zurück</a>
					<input type="submit" value="Abschicken">

					</form>
<?php
require("footer.php");
?>