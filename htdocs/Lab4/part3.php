<!DOCTYPE html>
<html>
<head>
	<title>lab 1 part 3</title>
</head>
<body>

<form action="part3.php" method="post">
Please put in the hour <input type="text" name="hour"><br>
<input type="submit">
</form>

<br>

<?php 
	
	include("header.php");

	part3();


	/*
	echo $_POST["hour"], "<br><br>";


	if ($_POST["hour"] < 10) 
	{
		echo "Have a Good Morning!";
	}
	else if ($_POST["hour"] >= 10 && $_POST["hour"] < 18) 
	{
		echo "Have a good day!";
	}
	else if ($_POST["hour"] >= 18 && $_POST["hour"] < 23) 
	{
		echo "Good Evening";
	}
	else
	{
		echo "Switch off the computer!";
	} 
`*/
?>


</body>
</html>