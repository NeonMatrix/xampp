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
			<li ><a href="search.php">Search</a></li>
			<li ><a href="reservedbooks.php">View Reserved Books</a></li>
			<li style="float:right;">
			<form method="post" onsubmit="return confirm ('Are you sure you want to log out?')";>
				<input type="submit" value="LOG OUT" name="logout"/>
			</form>
			</li>
		</ul>
</div>

<form method="post">
	<p>Book Title:
		<input type="text" name="booktitle">
	</p>
	<p>Author:
		<input type="text" name="author">
	</p>
	<p>Book Category:
		<input type="text" name="category">
	</p>

</form>

</body>
</html>