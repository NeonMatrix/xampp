<?php
	session_start();

	if(!isset($_SESSION['uname']))
	{
		echo '<script type="text/javascript">
							function Redirect()
						{
							location = "error.html";
						}
						
						Redirect();
				</script>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Libraray</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
	<meta charset="utf-8">
</head>
<body>

<?php
	$logout = isset($_POST['logout']) ? $_POST['logout'] : '';
	
	if($logout == "LOG OUT")
	{
		session_destroy();

		echo '<script type="text/javascript">
						function Redirect()
					{
						location = "index.html";
					}
					
					Redirect();
			</script>';
			
	}
?>

<header><img src="assets/logo.png" width="50%"></header>

<div>
		<ul>
			<li><a href="library.php">Home</a></li>
			<li><a class="active" href="search.php">Search</a></li>
			<li><a href="reserved.php">View Reserved Books</a></li>
			<li style="float:right;">
				<form method="post" onsubmit="return confirm ('Are you sure you want to log out?')";>
				<button class="button" type="submit" value="LOG OUT" name="logout">Log out</botton>
				</form>
			</li>
		</ul>
</div>


<div id="page">
<header> Search for books</header>

<?php

	$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
	mysqli_select_db($db, 'ca') or die(mysqli_error($db));

	$booktitle = isset($_POST['booktitle']) ? $_POST['booktitle'] : '';
	$author = isset($_POST['author']) ? $_POST['author'] : '';
	$category = isset($_POST['category']) ? $_POST['category'] : '';
	$reserve = isset($_POST['reserve']) ? $_POST['reserve'] : '';
	$uname = $_SESSION['uname'];

	if ($reserve != '') 
	{
		mysqli_query($db, "INSERT INTO reservations (ISBN, Username, ReservedDate)
		VALUES ('$reserve', '$uname', NOW() ) ");

		mysqli_query($db, "UPDATE books SET Reserved = 'Y' WHERE ISBN = '$reserve' ");
	}


	if ($booktitle == '' AND $author == '' AND $category == '') 
	{
		//Do nothing, because nothing was selected
	}

	// Searching with Book Title or Author
	if ($booktitle != '' OR $author != '') 
	{
		$category = '';

		if ($booktitle != '' AND $author == '') 
		{

			$result = mysqli_query($db, "SELECT * FROM books WHERE (booktitle LIKE '%$booktitle%') ");

			displayResult($result);
		}

		if ($booktitle == '' AND $author != '') 
		{
			$result = mysqli_query($db, "SELECT * FROM books WHERE (author LIKE '%$author%')");

			displayResult($result);
		}

		if ($booktitle != '' AND $author != '') 
		{

			$result = mysqli_query($db, "SELECT * FROM books WHERE(booktitle LIKE '%$booktitle%') AND (author LIKE '%$author%')");

			displayResult($result);
		}
	}

	// Searching with Category Search
	if ($category != '') 
	{
		$result = mysqli_query($db, "SELECT categoryID FROM categories WHERE CategoryDescription = '$category' ");

		$row = mysqli_fetch_row($result);

		$categoryNum = $row[0];

		$result = mysqli_query($db, "SELECT * FROM books WHERE category = '$categoryNum' ");

		displayResult($result);
	}


	function displayResult($result)
	{
		$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
		mysqli_select_db($db, 'ca') or die(mysqli_error($db));

		echo '<table>' . '<br>';
		echo '<tr id="columnHeader">
				<td>ISBN</td>
				<td>Book Title</td>
				<td>Author</td>
				<td>Edition</td>
				<td>Year</td>
				<td>Category</td>
				<td>Reserved</td>
			</tr>';

		mysqli_data_seek($result, 0);
		while ($row = mysqli_fetch_row($result)) 
		{
			echo "<tr>";
			$category = mysqli_query($db, "SELECT CategoryDescription FROM categories WHERE CategoryID = '$row[5]' ");
			$category = mysqli_fetch_row($category);

				for ($i = 0; $i < sizeof($row); $i++) 
				{
						if ($i == 5) 
						{
						 	echo('<td>'.$category[0].'</td>');
						}
						else
						{ 
							echo('<td>'.$row[$i].'</td>');
						}	
				}
				if ($row[6] != 'Y') {
					echo '<td>
						<form method="post" onsubmit="location= ">
							<button class="reserveButton" type="submit" value="' . $row[0] . '" name="reserve">Reserve</nuton>

						</form>						

						';
				}
			
			echo "</tr>";
		}
	}

?>

<form method="post">
	<p>
		Book Title: <input type="text" name="booktitle">
		Author: <input type="text" name="author">

		<input type="submit" value="Search"/>
	</p>
		<br>
		<p>
			Book Category:
			<select name="category">

				<?php

					$result = mysqli_query($db, 'SELECT CategoryDescription FROM categories');
					while ($row = mysqli_fetch_row($result)) 
					{
						echo '<option value= "'.$row[0].'">'.$row[0]. '</option>';
					}
				?>
	 		</select>

			<input type="submit" value="Search"/>
		</p>
</form>



<?php
	mysqli_close($db);
?>
</div>
</body>
</html>