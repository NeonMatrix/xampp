<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 part 2</title>
</head>
<body>

<?php

	$cities = array("Tokyo" => "Japan",
	"Mexico City" => "Mexico",
	"New York City" => "USA",
	"Mumbai" => "India",
	"Seoul" => "Korea",
	"Shanghai" => "China",
	"Lagos" => "Nigeria",
	"Buenos Aires" => "Argentina",
	"Cairo" => "Egypt",
	"London" => "England");

	echo "<ul>";
	foreach ($cities as $city => $country) {
		echo "<li>" . "City= ", $city . 
		"	Country= " . $country . "</li>";
	}
	echo "</ul>";

	

?>



</body>
</html>