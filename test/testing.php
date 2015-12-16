<!DOCTYPE html>
<html>
	<head>
  		<title>Test Site</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		
		
	</head>
	<body>



<h1> Die Überprüfung </h1>

<?php
//mit isset wird geprüft ob einer Variablen bereits 
//ein Wert zugewiesen wurde
	if (isset($_POST['absenden'])){
		//mit der Schleife foreach werden alle Elemente eines Arrays 
		//ausgegeben
	echo "Ihre ausgewählte Lottozahlen: <br>";
	foreach ($_POST['Lotto'] as &$value) {
		echo $value."<br>";
		}
	}l
	?>

</br></br></br>


<?php

$randno = array_rand(array_flip(range(1,42)),6);
echo "Gezogene Lotto Zahlen: </br>";
echo implode  (' ',$randno);
echo "<br/>";

$a = $POST ['box'];

$result = array_intersect ($a, $randno);
if($result==0) {
echo "Sie haben die richtige zahlen";
}
 else{
$result1 = count($result);
echo "ja du hast richtig $result1 richtig";
}

?>




<?php
    //Anzahl aus Gesamt.
    function Lotto($anzahl, $gesamt)
    {
        $spiel = array();

        for ($i=0; $i<$gesamt; $i++)

        {
            $spiel[] = $i+1;
        }

        //die Funktion shuffle  vermischt die Schlüsselelemente zufällig.
        srand ((float)microtime()*1000000);
        shuffle ($spiel);

        //die Funktion array_slice($array, $schluessel, $anzahl) trennt die ersten 6 ($anzahl) Elemente heraus.
        $result = array_slice($spiel, 0, $anzahl);

        //die Funktion sort()  sortiert das Array.
        sort($result);

        return $result;
    }

    //Anzahl aus Gesamt. Also 6 aus 49. Funktionsaufruf
    $myLotto = Lotto(6, 49);
    foreach($myLotto as $schluessel => $wert)
        {
        echo ("$wert<br>");
        }
//      }
//      else{
//      echo ("Fehler");
?>



	</body>
</html>
