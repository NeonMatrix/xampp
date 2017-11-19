<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 part 3</title>
</head>
<body>

<?php
	
	if(file_exists("lab5.1.txt"))
		echo "lab5.1.txt exists <br><br>";


	$file = fopen("lab5.1.txt", "a+") or exit("Unable to open file!");

	while(!feof($file))
		echo fgets($file). "<br>";


	$file2 = fopen("lab5.2.txt", "r") or exit("Unable to open file!");

	while (!feof($file2)) {
		fwrite($file, fgets($file2));
	}

	rewind($file);
	echo "<br><br> Appened file: <br><br>";
	while(!feof($file))
		echo fgets($file). "<br>";


	
	fclose($file);
	fclose($file2);

?>



</body>
</html>