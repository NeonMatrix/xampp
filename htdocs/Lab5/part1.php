<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 part 1</title>
</head>
<body>

<?php

	$cities = array("Tokyo" , "Mexico City", "New York City" , "Mumbai" , "Seoul", "Shanghai", "Lagos", "Buenos Aires", "Cairo" , "London");

	foreach ($cities as $value) {
		echo $value . ", ";
	}

	asort($cities);

	echo "<ul>";
	foreach ($cities as $value) {
		echo "<li>" . $value . "</li>";
	}
	echo "</ul>";

	$cities[] = "Los Angeles";
	$cities[] = "Calcutta";
	$cities[] = "Osaka";
	$cities[] = "Beijing";

	echo "<p> Added cities </p>";

	asort($cities);

	echo "<ul>";
	foreach ($cities as $value) {
		echo "<li>" . $value . "</li>";
	}
	echo "</ul>";

?>



</body>
</html>