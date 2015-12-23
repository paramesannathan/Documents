 <?php

require("config.php");

$username = $_POST["username"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

if($password != $password2 OR $username == "" OR $password == "")
    {
    echo "Eingabefehler. Bitte alle Felder korekt ausfüllen. <a href=\"register.php\">Zurück</a>";
    exit;
    }
$password =($password);

$result = mysql_query("SELECT id FROM logins WHERE username LIKE '$username'");
$menge = mysql_num_rows($result);

if($menge == 0)
    {
    $eintrag = "INSERT INTO logins (username, password) VALUES ('$username', '$password')";
    $eintragen = mysql_query($eintrag);

    if($eintragen == true)
        {
        echo "Benutzername <b>$username</b> wurde erstellt. <a href=\"login.php\">Zurück</a>";
        }
    else
        {
        echo "Fehler beim Speichern des Benutzernames. <a href=\"register.php\">Zurück</a>";
        }


    }

else
    {
    echo "Benutzername schon vorhanden. <a href=\"login.php\">Zurück</a>";
    }
?> 