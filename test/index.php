<!DOCTYPE html>
<html>
	<head>
  		<title>Test Site</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" href="jds.js">
		</script>
	</head>
	<body>
	<form action="loesung.php" method="post">	
<table>

	<?php
		for($x = 1; $x <= 42; $x++) {
		echo"<td><input type='checkbox' value='$x' name='Lotto[]' onclick='check()'> </td> ";
		echo "<td>$x<td>";	
		if (($x % 6) == 0){
	 	echo "<tr>";}
	}
	?>
<p>
</form>
</table>

<script type="text/javascript">
function check(){
//initial checkCount of zero
        var checkCount = 0;

//maximum number of allowed checked boxes
        var maxChecks = 6;
		var allbox = document.getElementsByTagName('input');
		for(x=0;x<allbox.length;x++){
		if(allbox[x].type == "checkbox" && allbox[x].checked){
			checkCount++;
                }
        }
	//      checkCount = $(':checked').length;
        console.log(checkCount);
        if (checkCount >= maxChecks) {
        console.log(checkCount);
        //alert('you may only choose up to ' + maxChecks + ' options');
                for(x=0;x<allbox.length;x++){
                if(allbox[x].type == "checkbox" && !allbox[x].checked){
                allbox[x].disabled=true;
                }
	}
}}

function auswahl(value) {
if (myArray.length <= 5){
	myArray.push(value);
	ausf.value=myArray;
}else {
	myArray.pop();
	alert("Alle Zahlen wurden eingegeben");
}
}

</script>
	<input type="submit" name="absenden" value="Liste absenden">
	<output type="text" id="order" size="50"><br>
	</body>
</html>
