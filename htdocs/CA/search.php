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

<header>Welcome to the library</header>

<div>
		<ul>
			<li><a href="library.php">Home</a></li>
			<li><a class="active" href="search.php">Search</a></li>
			<li><a href="reservedbooks.php">View Reserved Books</a></li>
			<li style="float:right;">
			<form method="post" onsubmit="return confirm ('Are you sure you want to log out?')";>
				<input type="submit" value="LOG OUT" name="logout"/>
			</form>
			</li>
		</ul>
</div>


<?php

	$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
	mysqli_select_db($db, 'ca') or die(mysqli_error($db));

	$booktitle = isset($_POST['booktitle']) ? $_POST['booktitle'] : '';
	$author = isset($_POST['author']) ? $_POST['author'] : '';
	$category = isset($_POST['category']) ? $_POST['category'] : '';

	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$results_per_page = 5; 
	$start_from = ($page-1) * $results_per_page;



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
			$result = mysqli_query($db, "SELECT * FROM books WHERE (booktitle LIKE '%$booktitle%') LIMIT $start_from, " . $results_per_page );

			$number_of_results = mysqli_query($db, "SELECT COUNT(booktitle) FROM books WHERE (booktitle LIKE '%$booktitle%') LIMIT $start_from, " . $results_per_page );
			$row = mysqli_fetch_row($number_of_results);
			
			$GLOBALS['result_num'] = $row[0];
			displayResult($result);
		}

		if ($booktitle == '' AND $author != '') 
		{
			$result = mysqli_query($db, "SELECT * FROM books WHERE (author LIKE '%$author%') LIMIT $start_from, " . $results_per_page );

			$number_of_results = mysqli_query($db, "SELECT COUNT(booktitle) FROM booksWHERE (author LIKE '%$author%') LIMIT $start_from, " . $results_per_page );
			$row = mysqli_fetch_row($number_of_results);
			
			$GLOBALS['result_num'] = $row[0];

			displayResult($result);
		}

		if ($booktitle != '' AND $author != '') 
		{
			$result = mysqli_query($db, "SELECT * FROM books WHERE(booktitle LIKE '%$booktitle%') AND (author LIKE '%$author%') LIMIT $start_from, " . $results_per_page );

			$number_of_results = mysqli_query($db, "SELECT COUNT(booktitle) FROM books  WHERE(booktitle LIKE '%$booktitle%') AND (author LIKE '%$author%') LIMIT $start_from, " . $results_per_page );
			$row = mysqli_fetch_row($number_of_results);
			
			$GLOBALS['result_num'] = $row[0];
			displayResult($result);
		}
	}

	// Searching with Category Search
	if ($category != '') 
	{
		$result = mysqli_query($db, "SELECT categoryID FROM categories WHERE CategoryDescription = '$category'  LIMIT $start_from, " . $results_per_page );
		$row = mysqli_fetch_row($result);

		$categoryNum = $row[0];

		$result = mysqli_query($db, "SELECT * FROM books WHERE category = '$categoryNum' ");

		$number_of_results = mysqli_query($db, "SELECT COUNT(category) FROM books WHERE category = '$categoryNum' ");
		$row = mysqli_fetch_row($number_of_results);
		
		$GLOBALS['result_num'] = $row[0];

		displayResult($result);
	}


	function displayResult($result, $category='')
	{
		$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error($db));
		mysqli_select_db($db, 'ca') or die(mysqli_error($db));

		if ($category == '') 
		{
			$row = mysqli_fetch_row($result);
			$categoryNum = $row[5];
			$category = mysqli_query($db, "SELECT * FROM categories WHERE CategoryID = '$categoryNum'");
			$row = mysqli_fetch_row($category);
			$category = $row[1];
		}

		echo '<table border="1" >' . '<br>';
		echo '<tr>
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
				for ($i = 0; $i < sizeof($row); $i++) 
				{
					if ($i == 5) 
					{
					 	echo("<td>".$category."</td>");
					}
					else
					{ 
						echo("<td>".$row[$i]."</td>");
					}

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

		<input type="submit" value="Search"/></p>
</form>



<?php
	
	$total_pages = ceil($GLOBALS['result_num'] / $results_per_page);

	//echo ($total_pages);
	for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
            echo "<a href='index.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> "; 
}; 

	mysqli_close($db);
?>

</body>
</html>