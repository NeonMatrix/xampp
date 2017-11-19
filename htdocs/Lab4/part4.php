<!DOCTYPE html>
<html>
<head>
	<title>lab 1 part 4</title>
</head>
<body>

<form action="part4.php" method="post">
Please put in a number <input type="text" name="num"><br>
<input type="submit">
</form>

<br>

<?php 
	
	include("header.php");

	part4();

	/*
	//echo $_POST["num"], "<br><br>";

	$i = 1;
	while ($i < $_POST["num"] + 1) {
		
		echo "<font size='$i' face='Arial'>";
		echo "Hello PHP <br>";

		$i++;
	}
	*/
?>


</body>
</html>