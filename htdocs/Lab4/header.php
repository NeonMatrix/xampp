<?php 

	function part1()
	{
		$time = date("H");

		if ($time < 10) 
		{
			echo "have a Good Morning";
		}
		else if ($time >= 10 && $time < 20) 
		{
			echo "Have a good day!";
		}
		else
		{
			echo "Have a good night!";
		}
	}

	///////////////////////
	function part2()
	{
		$nums = array(5, 10, 15, 20, 30, 35, 40);

		echo "This is a while loop <br><br>";

		$i = 0;
		while ($i < sizeof($nums)) {
			echo $nums[$i], "<br>";
			$i++;
		}

		echo "<br>This is a do while loop <br><br>";

		$i = 0;
		do
		{
			echo $nums[$i], "<br>";
			$i++;
		}
		while ($i < sizeof($nums));
	


	echo "<br>This is a foreach loop <br><br>";

	foreach ($nums as $key => $value) {
		echo "Key=", $key, "  Val=", $value, "<br>";
	}

	}
	////////////////////////////////////

	function part3()
	{
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
	}
	///////////////////////////

	function part4()
	{
		$i = 1;
		while ($i < $_POST["num"] + 1) {
			
			echo "<font size='$i' face='Arial'>";
			echo "Hello PHP <br>";

			$i++;
		}
	}
?>