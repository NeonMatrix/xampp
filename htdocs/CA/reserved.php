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
			<li><a href="search.php">Search</a></li>
			<li><a class="active" href="reserved.php">View Reserved Books</a></li>
			<li style="float:right;">
				<form method="post" onsubmit="return confirm ('Are you sure you want to log out?')";>
				<button class="button" type="submit" value="LOG OUT" name="logout">Log out</botton>
				</form>
			</li>
		</ul>
</div>

<div id="page">
<header> Your resevered books</header>

<?php
$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
	mysqli_select_db($db, 'ca') or die(mysqli_error($db));

	$reserve = isset($_POST['reserve']) ? $_POST['reserve'] : '';
	$uname = $_SESSION['uname'];

	if ($reserve != '') 
	{
		mysqli_query($db, "DELETE FROM reservations WHERE ISBN = '$reserve' ");

		mysqli_query($db, "UPDATE books SET Reserved = 'N' WHERE ISBN = '$reserve' ");
	}


	$result = mysqli_query($db, "SELECT ISBN, BookTitle, Author, ReservedDate FROM books NATURAL JOIN reservations WHERE books.ISBN = reservations.ISBN AND reservations.Username = '$uname' ");



	if (mysqli_fetch_row($result) != NULL) 
	{
		echo '<table>' . '<br>';
		echo '<tr id="columnHeader">
				<td>ISBN</td>
				<td>Book Title</td>
				<td>Author</td>
				<td>Reserved Date</td>
			</tr>';

		mysqli_data_seek($result, 0);
		while ($row = mysqli_fetch_row($result)) 
		{

			echo "<tr>";
				for ($i = 0; $i < sizeof($row); $i++) 
				{
						echo("<td>".$row[$i]."</td>");
				}
			
				echo '<td>
						<form method="post">
							<button class="reserveButton" type="submit" value="' . $row[0] . '" name="reserve">Remove</nuton>

						</form>	';
			
			echo "</tr>";
		}
	}
	else
	{
		echo "<p>No Reserved Books</p>";
	}



?>
</div>