<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 part 4</title>
</head>
<body>

<?php
	
	$upperCase = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

	$lowerCase = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

	$numbers = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");

	$other = array("#", "@", "?", "!", "+", "=", "_", "-");

	$password = array();

	for($i = 0; $i < 6; $i++)
		$password[] = $lowerCase[rand(0, sizeof($lowerCase) -1)];

	for($i = 0; $i < 3; $i++)
		$password[] = $upperCase[rand(0, sizeof($upperCase) -1)];

	for($i = 0; $i < 3; $i++)
		$password[] = $numbers[rand(0, sizeof($numbers) -1)];

	for($i = 0; $i < 3; $i++)
		$password[] = $other[rand(0, sizeof($other) -1)];


	echo "<br><br>Password: ";

	shuffle($password);

	foreach ($password as $char) {
		echo $char;
	}

?>

</body>
</html>